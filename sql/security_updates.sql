-- Add login_attempts table if it doesn't exist
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `attempt_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email_time` (`email`, `attempt_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Add security-related columns to users table if they don't exist
ALTER TABLE `users`
ADD COLUMN IF NOT EXISTS `salt` varchar(64) NOT NULL DEFAULT '' AFTER `password`,
ADD COLUMN IF NOT EXISTS `password_reset_token` varchar(64) DEFAULT NULL,
ADD COLUMN IF NOT EXISTS `password_reset_expires` datetime DEFAULT NULL,
ADD COLUMN IF NOT EXISTS `last_login` datetime DEFAULT NULL,
ADD COLUMN IF NOT EXISTS `failed_login_count` int(11) DEFAULT 0,
ADD COLUMN IF NOT EXISTS `account_locked_until` datetime DEFAULT NULL;

-- Add indexes for security-related columns
ALTER TABLE `users`
ADD INDEX IF NOT EXISTS `idx_email` (`email`),
ADD INDEX IF NOT EXISTS `idx_password_reset` (`password_reset_token`),
ADD INDEX IF NOT EXISTS `idx_account_lock` (`account_locked_until`);

-- Create stored procedure for secure password updates
DELIMITER //
CREATE PROCEDURE IF NOT EXISTS `update_user_password`(
    IN p_user_id INT,
    IN p_password VARCHAR(255),
    IN p_salt VARCHAR(64)
)
BEGIN
    UPDATE users 
    SET password = p_password,
        salt = p_salt,
        failed_login_count = 0,
        account_locked_until = NULL,
        password_reset_token = NULL,
        password_reset_expires = NULL
    WHERE id = p_user_id;
END //
DELIMITER ;

-- Create stored procedure for logging failed login attempts
DELIMITER //
CREATE PROCEDURE IF NOT EXISTS `log_failed_login`(
    IN p_email VARCHAR(255)
)
BEGIN
    INSERT INTO login_attempts (email, attempt_time) 
    VALUES (p_email, NOW());
    
    UPDATE users 
    SET failed_login_count = failed_login_count + 1,
        account_locked_until = CASE 
            WHEN failed_login_count >= 5 THEN DATE_ADD(NOW(), INTERVAL 30 MINUTE)
            ELSE NULL
        END
    WHERE email = p_email;
END //
DELIMITER ;

-- Create stored procedure for successful login
DELIMITER //
CREATE PROCEDURE IF NOT EXISTS `log_successful_login`(
    IN p_email VARCHAR(255)
)
BEGIN
    UPDATE users 
    SET last_login = NOW(),
        failed_login_count = 0,
        account_locked_until = NULL
    WHERE email = p_email;
    
    DELETE FROM login_attempts 
    WHERE email = p_email;
END //
DELIMITER ;
