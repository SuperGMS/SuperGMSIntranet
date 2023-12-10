<?php
if ($leiding != 1) {
    echo 'Geen toegang!';
} else {
?>
    <style>
        main .recent-orders table {
            text-align: left;
            width: 52.5%;
            margin-right: 5%;
            margin-bottom: 1.75%;
            float: left;
        }

        .devider {
            margin: 10px;
        }

        input {
            -webkit-font-smoothing: antialiased;
            text-size-adjust: 100%;
            --van-black: #000;
            --van-white: #fff;
            --van-gray-1: #f7f8fa;
            --van-gray-2: #f2f3f5;
            --van-gray-3: #ebedf0;
            --van-gray-4: #dcdee0;
            --van-gray-5: #c8c9cc;
            --van-gray-6: #969799;
            --van-gray-7: #646566;
            --van-gray-8: #323233;
            --van-red: #ee0a24;
            --van-blue: #1989fa;
            --van-orange: #ff976a;
            --van-orange-dark: #ed6a0c;
            --van-orange-light: #fffbe8;
            --van-green: #07c160;
            --van-gradient-red: linear-gradient(to right, #ff6034, #ee0a24);
            --van-gradient-orange: linear-gradient(to right, #ffd01e, #ff8917);
            --van-primary-color: var(--van-blue);
            --van-success-color: var(--van-green);
            --van-danger-color: var(--van-red);
            --van-warning-color: var(--van-orange);
            --van-text-color: var(--van-gray-8);
            --van-text-color-2: var(--van-gray-6);
            --van-text-color-3: var(--van-gray-5);
            --van-text-link-color: #576b95;
            --van-active-color: var(--van-gray-2);
            --van-active-opacity: 0.6;
            --van-disabled-opacity: 0.5;
            --van-background-color: var(--van-gray-1);
            --van-background-color-light: var(--van-white);
            --van-padding-base: 4px;
            --van-padding-xs: 8px;
            --van-padding-sm: 12px;
            --van-padding-md: 16px;
            --van-padding-lg: 24px;
            --van-padding-xl: 32px;
            --van-font-size-xs: 10px;
            --van-font-size-sm: 12px;
            --van-font-size-md: 14px;
            --van-font-size-lg: 16px;
            --van-font-weight-bold: 500;
            --van-line-height-xs: 14px;
            --van-line-height-sm: 18px;
            --van-line-height-md: 20px;
            --van-line-height-lg: 22px;
            --van-base-font-family: -apple-system, BlinkMacSystemFont, 'Helvetica Neue', Helvetica, Segoe UI, Arial, Roboto, 'PingFang SC', 'miui', 'Hiragino Sans GB', 'Microsoft Yahei', sans-serif;
            --van-price-integer-font-family: Avenir-Heavy, PingFang SC, Helvetica Neue, Arial, sans-serif;
            --van-animation-duration-base: 0.3s;
            --van-animation-duration-fast: 0.2s;
            --van-animation-timing-function-enter: ease-out;
            --van-animation-timing-function-leave: ease-in;
            --van-border-color: var(--van-gray-3);
            --van-border-width-base: 1px;
            --van-border-radius-sm: 2px;
            --van-border-radius-md: 4px;
            --van-border-radius-lg: 8px;
            --van-border-radius-max: 999px;
            --van-badge-size: 16px;
            --van-badge-color: var(--van-white);
            --van-badge-padding: 0 3px;
            --van-badge-font-size: var(--van-font-size-sm);
            --van-badge-font-weight: var(--van-font-weight-bold);
            --van-badge-border-width: var(--van-border-width-base);
            --van-badge-background-color: var(--van-danger-color);
            --van-badge-dot-color: var(--van-danger-color);
            --van-badge-dot-size: 8px;
            --van-badge-font-family: -apple-system-font, Helvetica Neue, Arial, sans-serif;
            --van-popup-background-color: var(--van-background-color-light);
            --van-popup-transition: transform var(--van-animation-duration-base);
            --van-popup-round-border-radius: 16px;
            --van-popup-close-icon-size: 22px;
            --van-popup-close-icon-color: var(--van-gray-5);
            --van-popup-close-icon-margin: 16px;
            --van-popup-close-icon-z-index: 1;
            --van-loading-text-color: var(--van-text-color-2);
            --van-loading-text-font-size: var(--van-font-size-md);
            --van-loading-spinner-color: var(--van-gray-5);
            --van-loading-spinner-size: 30px;
            --van-loading-spinner-animation-duration: 0.8s;
            --van-button-mini-height: 24px;
            --van-button-mini-padding: 0 var(--van-padding-base);
            --van-button-mini-font-size: var(--van-font-size-xs);
            --van-button-small-height: 32px;
            --van-button-small-padding: 0 var(--van-padding-xs);
            --van-button-small-font-size: var(--van-font-size-sm);
            --van-button-normal-padding: 0 15px;
            --van-button-normal-font-size: var(--van-font-size-md);
            --van-button-large-height: 50px;
            --van-button-default-height: 44px;
            --van-button-default-line-height: 1.2;
            --van-button-default-font-size: var(--van-font-size-lg);
            --van-button-default-color: var(--van-text-color);
            --van-button-default-background-color: var(--van-background-color-light);
            --van-button-default-border-color: var(--van-border-color);
            --van-button-primary-color: var(--van-white);
            --van-button-primary-background-color: var(--van-primary-color);
            --van-button-primary-border-color: var(--van-primary-color);
            --van-button-success-color: var(--van-white);
            --van-button-success-background-color: var(--van-success-color);
            --van-button-success-border-color: var(--van-success-color);
            --van-button-danger-color: var(--van-white);
            --van-button-danger-background-color: var(--van-danger-color);
            --van-button-danger-border-color: var(--van-danger-color);
            --van-button-warning-color: var(--van-white);
            --van-button-warning-background-color: var(--van-warning-color);
            --van-button-warning-border-color: var(--van-warning-color);
            --van-button-border-width: var(--van-border-width-base);
            --van-button-border-radius: var(--van-border-radius-sm);
            --van-button-round-border-radius: var(--van-border-radius-max);
            --van-button-plain-background-color: var(--van-white);
            --van-button-disabled-opacity: var(--van-disabled-opacity);
            --van-button-icon-size: 1.2em;
            --van-button-loading-icon-size: 20px;
            --van-nav-bar-height: 46px;
            --van-nav-bar-background-color: var(--van-background-color-light);
            --van-nav-bar-arrow-size: 16px;
            --van-nav-bar-icon-color: var(--van-primary-color);
            --van-nav-bar-text-color: var(--van-primary-color);
            --van-nav-bar-title-font-size: var(--van-font-size-lg);
            --van-nav-bar-title-text-color: var(--van-text-color);
            --van-nav-bar-z-index: 1;
            --van-image-placeholder-text-color: var(--van-text-color-2);
            --van-image-placeholder-font-size: var(--van-font-size-md);
            --van-image-placeholder-background-color: var(--van-background-color);
            --van-image-loading-icon-size: 32px;
            --van-image-loading-icon-color: var(--van-gray-4);
            --van-image-error-icon-size: 32px;
            --van-image-error-icon-color: var(--van-gray-4);
            --van-tag-padding: 0 var(--van-padding-base);
            --van-tag-text-color: var(--van-white);
            --van-tag-font-size: var(--van-font-size-sm);
            --van-tag-border-radius: 2px;
            --van-tag-line-height: 16px;
            --van-tag-medium-padding: 2px 6px;
            --van-tag-large-padding: var(--van-padding-base) var(--van-padding-xs);
            --van-tag-large-border-radius: var(--van-border-radius-md);
            --van-tag-large-font-size: var(--van-font-size-md);
            --van-tag-round-border-radius: var(--van-border-radius-max);
            --van-tag-danger-color: var(--van-danger-color);
            --van-tag-primary-color: var(--van-primary-color);
            --van-tag-success-color: var(--van-success-color);
            --van-tag-warning-color: var(--van-warning-color);
            --van-tag-default-color: var(--van-gray-6);
            --van-tag-plain-background-color: var(--van-background-color-light);
            --van-card-padding: var(--van-padding-xs) var(--van-padding-md);
            --van-card-font-size: var(--van-font-size-sm);
            --van-card-text-color: var(--van-text-color);
            --van-card-background-color: var(--van-gray-1);
            --van-card-thumb-size: 88px;
            --van-card-thumb-border-radius: var(--van-border-radius-lg);
            --van-card-title-line-height: 16px;
            --van-card-desc-color: var(--van-gray-7);
            --van-card-desc-line-height: var(--van-line-height-md);
            --van-card-price-color: var(--van-gray-8);
            --van-card-origin-price-color: var(--van-text-color-2);
            --van-card-num-color: var(--van-text-color-2);
            --van-card-origin-price-font-size: var(--van-font-size-xs);
            --van-card-price-font-size: var(--van-font-size-sm);
            --van-card-price-integer-font-size: var(--van-font-size-lg);
            --van-card-price-font-family: var(--van-price-integer-font-family);
            --van-checkbox-size: 20px;
            --van-checkbox-border-color: var(--van-gray-5);
            --van-checkbox-transition-duration: var(--van-animation-duration-fast);
            --van-checkbox-label-margin: var(--van-padding-xs);
            --van-checkbox-label-color: var(--van-text-color);
            --van-checkbox-checked-icon-color: var(--van-primary-color);
            --van-checkbox-disabled-icon-color: var(--van-gray-5);
            --van-checkbox-disabled-label-color: var(--van-text-color-3);
            --van-checkbox-disabled-background-color: var(--van-border-color);
            --van-overlay-z-index: 1;
            --van-overlay-background-color: rgba(0, 0, 0, 0.7);
            box-sizing: inherit;
            margin: 0;
            font-family: BlinkMacSystemFont, -apple-system, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
            -webkit-appearance: none;
            align-items: center;
            border: 1px solid transparent;
            display: inline-flex;
            font-size: 1rem;
            height: 2.5em;
            justify-content: flex-start;
            line-height: 1.5;
            padding-bottom: calc(.5em - 1px);
            padding-left: calc(.75em - 1px);
            padding-right: calc(.75em - 1px);
            padding-top: calc(.5em - 1px);
            position: relative;
            vertical-align: top;
            background-color: #fff;
            border-color: #dbdbdb;
            border-radius: 4px;
            color: #363636;
            max-width: 100%;
            width: 100%;
            box-shadow: none;
        }

        .nieuw {
            -webkit-font-smoothing: antialiased;
            text-size-adjust: 100%;
            --van-black: #000;
            --van-white: #fff;
            --van-gray-1: #f7f8fa;
            --van-gray-2: #f2f3f5;
            --van-gray-3: #ebedf0;
            --van-gray-4: #dcdee0;
            --van-gray-5: #c8c9cc;
            --van-gray-6: #969799;
            --van-gray-7: #646566;
            --van-gray-8: #323233;
            --van-red: #ee0a24;
            --van-blue: #1989fa;
            --van-orange: #ff976a;
            --van-orange-dark: #ed6a0c;
            --van-orange-light: #fffbe8;
            --van-green: #07c160;
            --van-gradient-red: linear-gradient(to right, #ff6034, #ee0a24);
            --van-gradient-orange: linear-gradient(to right, #ffd01e, #ff8917);
            --van-primary-color: var(--van-blue);
            --van-success-color: var(--van-green);
            --van-danger-color: var(--van-red);
            --van-warning-color: var(--van-orange);
            --van-text-color: var(--van-gray-8);
            --van-text-color-2: var(--van-gray-6);
            --van-text-color-3: var(--van-gray-5);
            --van-text-link-color: #576b95;
            --van-active-color: var(--van-gray-2);
            --van-active-opacity: 0.6;
            --van-disabled-opacity: 0.5;
            --van-background-color: var(--van-gray-1);
            --van-background-color-light: var(--van-white);
            --van-padding-base: 4px;
            --van-padding-xs: 8px;
            --van-padding-sm: 12px;
            --van-padding-md: 16px;
            --van-padding-lg: 24px;
            --van-padding-xl: 32px;
            --van-font-size-xs: 10px;
            --van-font-size-sm: 12px;
            --van-font-size-md: 14px;
            --van-font-size-lg: 16px;
            --van-font-weight-bold: 500;
            --van-line-height-xs: 14px;
            --van-line-height-sm: 18px;
            --van-line-height-md: 20px;
            --van-line-height-lg: 22px;
            --van-base-font-family: -apple-system, BlinkMacSystemFont, 'Helvetica Neue', Helvetica, Segoe UI, Arial, Roboto, 'PingFang SC', 'miui', 'Hiragino Sans GB', 'Microsoft Yahei', sans-serif;
            --van-price-integer-font-family: Avenir-Heavy, PingFang SC, Helvetica Neue, Arial, sans-serif;
            --van-animation-duration-base: 0.3s;
            --van-animation-duration-fast: 0.2s;
            --van-animation-timing-function-enter: ease-out;
            --van-animation-timing-function-leave: ease-in;
            --van-border-color: var(--van-gray-3);
            --van-border-width-base: 1px;
            --van-border-radius-sm: 2px;
            --van-border-radius-md: 4px;
            --van-border-radius-lg: 8px;
            --van-border-radius-max: 999px;
            --van-badge-size: 16px;
            --van-badge-color: var(--van-white);
            --van-badge-padding: 0 3px;
            --van-badge-font-size: var(--van-font-size-sm);
            --van-badge-font-weight: var(--van-font-weight-bold);
            --van-badge-border-width: var(--van-border-width-base);
            --van-badge-background-color: var(--van-danger-color);
            --van-badge-dot-color: var(--van-danger-color);
            --van-badge-dot-size: 8px;
            --van-badge-font-family: -apple-system-font, Helvetica Neue, Arial, sans-serif;
            --van-popup-background-color: var(--van-background-color-light);
            --van-popup-transition: transform var(--van-animation-duration-base);
            --van-popup-round-border-radius: 16px;
            --van-popup-close-icon-size: 22px;
            --van-popup-close-icon-color: var(--van-gray-5);
            --van-popup-close-icon-margin: 16px;
            --van-popup-close-icon-z-index: 1;
            --van-loading-text-color: var(--van-text-color-2);
            --van-loading-text-font-size: var(--van-font-size-md);
            --van-loading-spinner-color: var(--van-gray-5);
            --van-loading-spinner-size: 30px;
            --van-loading-spinner-animation-duration: 0.8s;
            --van-button-mini-height: 24px;
            --van-button-mini-padding: 0 var(--van-padding-base);
            --van-button-mini-font-size: var(--van-font-size-xs);
            --van-button-small-height: 32px;
            --van-button-small-padding: 0 var(--van-padding-xs);
            --van-button-small-font-size: var(--van-font-size-sm);
            --van-button-normal-padding: 0 15px;
            --van-button-normal-font-size: var(--van-font-size-md);
            --van-button-large-height: 50px;
            --van-button-default-height: 44px;
            --van-button-default-line-height: 1.2;
            --van-button-default-font-size: var(--van-font-size-lg);
            --van-button-default-color: var(--van-text-color);
            --van-button-default-background-color: var(--van-background-color-light);
            --van-button-default-border-color: var(--van-border-color);
            --van-button-primary-color: var(--van-white);
            --van-button-primary-background-color: var(--van-primary-color);
            --van-button-primary-border-color: var(--van-primary-color);
            --van-button-success-color: var(--van-white);
            --van-button-success-background-color: var(--van-success-color);
            --van-button-success-border-color: var(--van-success-color);
            --van-button-danger-color: var(--van-white);
            --van-button-danger-background-color: var(--van-danger-color);
            --van-button-danger-border-color: var(--van-danger-color);
            --van-button-warning-color: var(--van-white);
            --van-button-warning-background-color: var(--van-warning-color);
            --van-button-warning-border-color: var(--van-warning-color);
            --van-button-border-width: var(--van-border-width-base);
            --van-button-border-radius: var(--van-border-radius-sm);
            --van-button-round-border-radius: var(--van-border-radius-max);
            --van-button-plain-background-color: var(--van-white);
            --van-button-disabled-opacity: var(--van-disabled-opacity);
            --van-button-icon-size: 1.2em;
            --van-button-loading-icon-size: 20px;
            --van-nav-bar-height: 46px;
            --van-nav-bar-background-color: var(--van-background-color-light);
            --van-nav-bar-arrow-size: 16px;
            --van-nav-bar-icon-color: var(--van-primary-color);
            --van-nav-bar-text-color: var(--van-primary-color);
            --van-nav-bar-title-font-size: var(--van-font-size-lg);
            --van-nav-bar-title-text-color: var(--van-text-color);
            --van-nav-bar-z-index: 1;
            --van-image-placeholder-text-color: var(--van-text-color-2);
            --van-image-placeholder-font-size: var(--van-font-size-md);
            --van-image-placeholder-background-color: var(--van-background-color);
            --van-image-loading-icon-size: 32px;
            --van-image-loading-icon-color: var(--van-gray-4);
            --van-image-error-icon-size: 32px;
            --van-image-error-icon-color: var(--van-gray-4);
            --van-tag-padding: 0 var(--van-padding-base);
            --van-tag-text-color: var(--van-white);
            --van-tag-font-size: var(--van-font-size-sm);
            --van-tag-border-radius: 2px;
            --van-tag-line-height: 16px;
            --van-tag-medium-padding: 2px 6px;
            --van-tag-large-padding: var(--van-padding-base) var(--van-padding-xs);
            --van-tag-large-border-radius: var(--van-border-radius-md);
            --van-tag-large-font-size: var(--van-font-size-md);
            --van-tag-round-border-radius: var(--van-border-radius-max);
            --van-tag-danger-color: var(--van-danger-color);
            --van-tag-primary-color: var(--van-primary-color);
            --van-tag-success-color: var(--van-success-color);
            --van-tag-warning-color: var(--van-warning-color);
            --van-tag-default-color: var(--van-gray-6);
            --van-tag-plain-background-color: var(--van-background-color-light);
            --van-card-padding: var(--van-padding-xs) var(--van-padding-md);
            --van-card-font-size: var(--van-font-size-sm);
            --van-card-text-color: var(--van-text-color);
            --van-card-background-color: var(--van-gray-1);
            --van-card-thumb-size: 88px;
            --van-card-thumb-border-radius: var(--van-border-radius-lg);
            --van-card-title-line-height: 16px;
            --van-card-desc-color: var(--van-gray-7);
            --van-card-desc-line-height: var(--van-line-height-md);
            --van-card-price-color: var(--van-gray-8);
            --van-card-origin-price-color: var(--van-text-color-2);
            --van-card-num-color: var(--van-text-color-2);
            --van-card-origin-price-font-size: var(--van-font-size-xs);
            --van-card-price-font-size: var(--van-font-size-sm);
            --van-card-price-integer-font-size: var(--van-font-size-lg);
            --van-card-price-font-family: var(--van-price-integer-font-family);
            --van-checkbox-size: 20px;
            --van-checkbox-border-color: var(--van-gray-5);
            --van-checkbox-transition-duration: var(--van-animation-duration-fast);
            --van-checkbox-label-margin: var(--van-padding-xs);
            --van-checkbox-label-color: var(--van-text-color);
            --van-checkbox-checked-icon-color: var(--van-primary-color);
            --van-checkbox-disabled-icon-color: var(--van-gray-5);
            --van-checkbox-disabled-label-color: var(--van-text-color-3);
            --van-checkbox-disabled-background-color: var(--van-border-color);
            --van-overlay-z-index: 1;
            --van-overlay-background-color: rgba(0, 0, 0, 0.7);
            box-sizing: inherit;
            margin: 0;
            font-family: BlinkMacSystemFont, -apple-system, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
            user-select: none;
            -webkit-appearance: none;
            align-items: center;
            border: 1px solid transparent;
            border-radius: 4px;
            display: inline-flex;
            font-size: 1rem;
            height: 2.5em;
            line-height: 1.5;
            position: relative;
            vertical-align: top;
            border-width: 1px;
            cursor: pointer;
            justify-content: center;
            padding-bottom: calc(.5em - 1px);
            padding-left: 1em;
            padding-right: 1em;
            padding-top: calc(.5em - 1px);
            text-align: center;
            white-space: nowrap;
            outline: 0;
            background-color: #48c774;
            border-color: transparent;
            color: #fff;
            box-shadow: 0 0 0 .125em rgba(72, 199, 116, .25);
        }

        .selectnieuwe {
            -webkit-font-smoothing: antialiased;
            text-size-adjust: 100%;
            --van-black: #000;
            --van-white: #fff;
            --van-gray-1: #f7f8fa;
            --van-gray-2: #f2f3f5;
            --van-gray-3: #ebedf0;
            --van-gray-4: #dcdee0;
            --van-gray-5: #c8c9cc;
            --van-gray-6: #969799;
            --van-gray-7: #646566;
            --van-gray-8: #323233;
            --van-red: #ee0a24;
            --van-blue: #1989fa;
            --van-orange: #ff976a;
            --van-orange-dark: #ed6a0c;
            --van-orange-light: #fffbe8;
            --van-green: #07c160;
            --van-gradient-red: linear-gradient(to right, #ff6034, #ee0a24);
            --van-gradient-orange: linear-gradient(to right, #ffd01e, #ff8917);
            --van-primary-color: var(--van-blue);
            --van-success-color: var(--van-green);
            --van-danger-color: var(--van-red);
            --van-warning-color: var(--van-orange);
            --van-text-color: var(--van-gray-8);
            --van-text-color-2: var(--van-gray-6);
            --van-text-color-3: var(--van-gray-5);
            --van-text-link-color: #576b95;
            --van-active-color: var(--van-gray-2);
            --van-active-opacity: 0.6;
            --van-disabled-opacity: 0.5;
            --van-background-color: var(--van-gray-1);
            --van-background-color-light: var(--van-white);
            --van-padding-base: 4px;
            --van-padding-xs: 8px;
            --van-padding-sm: 12px;
            --van-padding-md: 16px;
            --van-padding-lg: 24px;
            --van-padding-xl: 32px;
            --van-font-size-xs: 10px;
            --van-font-size-sm: 12px;
            --van-font-size-md: 14px;
            --van-font-size-lg: 16px;
            --van-font-weight-bold: 500;
            --van-line-height-xs: 14px;
            --van-line-height-sm: 18px;
            --van-line-height-md: 20px;
            --van-line-height-lg: 22px;
            --van-base-font-family: -apple-system, BlinkMacSystemFont, 'Helvetica Neue', Helvetica, Segoe UI, Arial, Roboto, 'PingFang SC', 'miui', 'Hiragino Sans GB', 'Microsoft Yahei', sans-serif;
            --van-price-integer-font-family: Avenir-Heavy, PingFang SC, Helvetica Neue, Arial, sans-serif;
            --van-animation-duration-base: 0.3s;
            --van-animation-duration-fast: 0.2s;
            --van-animation-timing-function-enter: ease-out;
            --van-animation-timing-function-leave: ease-in;
            --van-border-color: var(--van-gray-3);
            --van-border-width-base: 1px;
            --van-border-radius-sm: 2px;
            --van-border-radius-md: 4px;
            --van-border-radius-lg: 8px;
            --van-border-radius-max: 999px;
            --van-badge-size: 16px;
            --van-badge-color: var(--van-white);
            --van-badge-padding: 0 3px;
            --van-badge-font-size: var(--van-font-size-sm);
            --van-badge-font-weight: var(--van-font-weight-bold);
            --van-badge-border-width: var(--van-border-width-base);
            --van-badge-background-color: var(--van-danger-color);
            --van-badge-dot-color: var(--van-danger-color);
            --van-badge-dot-size: 8px;
            --van-badge-font-family: -apple-system-font, Helvetica Neue, Arial, sans-serif;
            --van-popup-background-color: var(--van-background-color-light);
            --van-popup-transition: transform var(--van-animation-duration-base);
            --van-popup-round-border-radius: 16px;
            --van-popup-close-icon-size: 22px;
            --van-popup-close-icon-color: var(--van-gray-5);
            --van-popup-close-icon-margin: 16px;
            --van-popup-close-icon-z-index: 1;
            --van-loading-text-color: var(--van-text-color-2);
            --van-loading-text-font-size: var(--van-font-size-md);
            --van-loading-spinner-color: var(--van-gray-5);
            --van-loading-spinner-size: 30px;
            --van-loading-spinner-animation-duration: 0.8s;
            --van-button-mini-height: 24px;
            --van-button-mini-padding: 0 var(--van-padding-base);
            --van-button-mini-font-size: var(--van-font-size-xs);
            --van-button-small-height: 32px;
            --van-button-small-padding: 0 var(--van-padding-xs);
            --van-button-small-font-size: var(--van-font-size-sm);
            --van-button-normal-padding: 0 15px;
            --van-button-normal-font-size: var(--van-font-size-md);
            --van-button-large-height: 50px;
            --van-button-default-height: 44px;
            --van-button-default-line-height: 1.2;
            --van-button-default-font-size: var(--van-font-size-lg);
            --van-button-default-color: var(--van-text-color);
            --van-button-default-background-color: var(--van-background-color-light);
            --van-button-default-border-color: var(--van-border-color);
            --van-button-primary-color: var(--van-white);
            --van-button-primary-background-color: var(--van-primary-color);
            --van-button-primary-border-color: var(--van-primary-color);
            --van-button-success-color: var(--van-white);
            --van-button-success-background-color: var(--van-success-color);
            --van-button-success-border-color: var(--van-success-color);
            --van-button-danger-color: var(--van-white);
            --van-button-danger-background-color: var(--van-danger-color);
            --van-button-danger-border-color: var(--van-danger-color);
            --van-button-warning-color: var(--van-white);
            --van-button-warning-background-color: var(--van-warning-color);
            --van-button-warning-border-color: var(--van-warning-color);
            --van-button-border-width: var(--van-border-width-base);
            --van-button-border-radius: var(--van-border-radius-sm);
            --van-button-round-border-radius: var(--van-border-radius-max);
            --van-button-plain-background-color: var(--van-white);
            --van-button-disabled-opacity: var(--van-disabled-opacity);
            --van-button-icon-size: 1.2em;
            --van-button-loading-icon-size: 20px;
            --van-nav-bar-height: 46px;
            --van-nav-bar-background-color: var(--van-background-color-light);
            --van-nav-bar-arrow-size: 16px;
            --van-nav-bar-icon-color: var(--van-primary-color);
            --van-nav-bar-text-color: var(--van-primary-color);
            --van-nav-bar-title-font-size: var(--van-font-size-lg);
            --van-nav-bar-title-text-color: var(--van-text-color);
            --van-nav-bar-z-index: 1;
            --van-image-placeholder-text-color: var(--van-text-color-2);
            --van-image-placeholder-font-size: var(--van-font-size-md);
            --van-image-placeholder-background-color: var(--van-background-color);
            --van-image-loading-icon-size: 32px;
            --van-image-loading-icon-color: var(--van-gray-4);
            --van-image-error-icon-size: 32px;
            --van-image-error-icon-color: var(--van-gray-4);
            --van-tag-padding: 0 var(--van-padding-base);
            --van-tag-text-color: var(--van-white);
            --van-tag-font-size: var(--van-font-size-sm);
            --van-tag-border-radius: 2px;
            --van-tag-line-height: 16px;
            --van-tag-medium-padding: 2px 6px;
            --van-tag-large-padding: var(--van-padding-base) var(--van-padding-xs);
            --van-tag-large-border-radius: var(--van-border-radius-md);
            --van-tag-large-font-size: var(--van-font-size-md);
            --van-tag-round-border-radius: var(--van-border-radius-max);
            --van-tag-danger-color: var(--van-danger-color);
            --van-tag-primary-color: var(--van-primary-color);
            --van-tag-success-color: var(--van-success-color);
            --van-tag-warning-color: var(--van-warning-color);
            --van-tag-default-color: var(--van-gray-6);
            --van-tag-plain-background-color: var(--van-background-color-light);
            --van-card-padding: var(--van-padding-xs) var(--van-padding-md);
            --van-card-font-size: var(--van-font-size-sm);
            --van-card-text-color: var(--van-text-color);
            --van-card-background-color: var(--van-gray-1);
            --van-card-thumb-size: 88px;
            --van-card-thumb-border-radius: var(--van-border-radius-lg);
            --van-card-title-line-height: 16px;
            --van-card-desc-color: var(--van-gray-7);
            --van-card-desc-line-height: var(--van-line-height-md);
            --van-card-price-color: var(--van-gray-8);
            --van-card-origin-price-color: var(--van-text-color-2);
            --van-card-num-color: var(--van-text-color-2);
            --van-card-origin-price-font-size: var(--van-font-size-xs);
            --van-card-price-font-size: var(--van-font-size-sm);
            --van-card-price-integer-font-size: var(--van-font-size-lg);
            --van-card-price-font-family: var(--van-price-integer-font-family);
            --van-checkbox-size: 20px;
            --van-checkbox-border-color: var(--van-gray-5);
            --van-checkbox-transition-duration: var(--van-animation-duration-fast);
            --van-checkbox-label-margin: var(--van-padding-xs);
            --van-checkbox-label-color: var(--van-text-color);
            --van-checkbox-checked-icon-color: var(--van-primary-color);
            --van-checkbox-disabled-icon-color: var(--van-gray-5);
            --van-checkbox-disabled-label-color: var(--van-text-color-3);
            --van-checkbox-disabled-background-color: var(--van-border-color);
            --van-overlay-z-index: 1;
            --van-overlay-background-color: rgba(0, 0, 0, 0.7);
            box-sizing: inherit;
            margin: 0;
            font-family: BlinkMacSystemFont, -apple-system, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
            -webkit-appearance: none;
            align-items: center;
            border: 1px solid transparent;
            height: 2.5em;
            justify-content: flex-start;
            line-height: 1.5;
            padding-bottom: calc(.5em - 1px);
            padding-left: calc(.75em - 1px);
            padding-top: calc(.5em - 1px);
            position: relative;
            vertical-align: top;
            background-color: #fff;
            border-radius: 4px;
            color: #363636;
            cursor: pointer;
            display: block;
            font-size: 1em;
            max-width: 100%;
            outline: 0;
            border-color: #3273dc;
            box-shadow: 0 0 0 .125em rgba(50, 115, 220, .25);
            padding-right: 2.5em;
            -webkit-font-smoothing: antialiased;
            text-size-adjust: 10
        }

        .labellabel-primary {
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            -webkit-text-size-adjust: 100%;
            --van-black: #000;
            --van-white: #fff;
            --van-gray-1: #f7f8fa;
            --van-gray-2: #f2f3f5;
            --van-gray-3: #ebedf0;
            --van-gray-4: #dcdee0;
            --van-gray-5: #c8c9cc;
            --van-gray-6: #969799;
            --van-gray-7: #646566;
            --van-gray-8: #323233;
            --van-red: #ee0a24;
            --van-blue: #1989fa;
            --van-orange: #ff976a;
            --van-orange-dark: #ed6a0c;
            --van-orange-light: #fffbe8;
            --van-green: #07c160;
            --van-gradient-red: linear-gradient(to right, #ff6034, #ee0a24);
            --van-gradient-orange: linear-gradient(to right, #ffd01e, #ff8917);
            --van-primary-color: var(--van-blue);
            --van-success-color: var(--van-green);
            --van-danger-color: var(--van-red);
            --van-warning-color: var(--van-orange);
            --van-text-color: var(--van-gray-8);
            --van-text-color-2: var(--van-gray-6);
            --van-text-color-3: var(--van-gray-5);
            --van-text-link-color: #576b95;
            --van-active-color: var(--van-gray-2);
            --van-active-opacity: 0.6;
            --van-disabled-opacity: 0.5;
            --van-background-color: var(--van-gray-1);
            --van-background-color-light: var(--van-white);
            --van-padding-base: 4px;
            --van-padding-xs: 8px;
            --van-padding-sm: 12px;
            --van-padding-md: 16px;
            --van-padding-lg: 24px;
            --van-padding-xl: 32px;
            --van-font-size-xs: 10px;
            --van-font-size-sm: 12px;
            --van-font-size-md: 14px;
            --van-font-size-lg: 16px;
            --van-font-weight-bold: 500;
            --van-line-height-xs: 14px;
            --van-line-height-sm: 18px;
            --van-line-height-md: 20px;
            --van-line-height-lg: 22px;
            --van-base-font-family: -apple-system, BlinkMacSystemFont, 'Helvetica Neue', Helvetica, Segoe UI, Arial, Roboto, 'PingFang SC', 'miui', 'Hiragino Sans GB', 'Microsoft Yahei', sans-serif;
            --van-price-integer-font-family: Avenir-Heavy, PingFang SC, Helvetica Neue, Arial, sans-serif;
            --van-animation-duration-base: 0.3s;
            --van-animation-duration-fast: 0.2s;
            --van-animation-timing-function-enter: ease-out;
            --van-animation-timing-function-leave: ease-in;
            --van-border-color: var(--van-gray-3);
            --van-border-width-base: 1px;
            --van-border-radius-sm: 2px;
            --van-border-radius-md: 4px;
            --van-border-radius-lg: 8px;
            --van-border-radius-max: 999px;
            --van-badge-size: 16px;
            --van-badge-color: var(--van-white);
            --van-badge-padding: 0 3px;
            --van-badge-font-size: var(--van-font-size-sm);
            --van-badge-font-weight: var(--van-font-weight-bold);
            --van-badge-border-width: var(--van-border-width-base);
            --van-badge-background-color: var(--van-danger-color);
            --van-badge-dot-color: var(--van-danger-color);
            --van-badge-dot-size: 8px;
            --van-badge-font-family: -apple-system-font, Helvetica Neue, Arial, sans-serif;
            --van-popup-background-color: var(--van-background-color-light);
            --van-popup-transition: transform var(--van-animation-duration-base);
            --van-popup-round-border-radius: 16px;
            --van-popup-close-icon-size: 22px;
            --van-popup-close-icon-color: var(--van-gray-5);
            --van-popup-close-icon-margin: 16px;
            --van-popup-close-icon-z-index: 1;
            --van-loading-text-color: var(--van-text-color-2);
            --van-loading-text-font-size: var(--van-font-size-md);
            --van-loading-spinner-color: var(--van-gray-5);
            --van-loading-spinner-size: 30px;
            --van-loading-spinner-animation-duration: 0.8s;
            --van-button-mini-height: 24px;
            --van-button-mini-padding: 0 var(--van-padding-base);
            --van-button-mini-font-size: var(--van-font-size-xs);
            --van-button-small-height: 32px;
            --van-button-small-padding: 0 var(--van-padding-xs);
            --van-button-small-font-size: var(--van-font-size-sm);
            --van-button-normal-padding: 0 15px;
            --van-button-normal-font-size: var(--van-font-size-md);
            --van-button-large-height: 50px;
            --van-button-default-height: 44px;
            --van-button-default-line-height: 1.2;
            --van-button-default-font-size: var(--van-font-size-lg);
            --van-button-default-color: var(--van-text-color);
            --van-button-default-background-color: var(--van-background-color-light);
            --van-button-default-border-color: var(--van-border-color);
            --van-button-primary-color: var(--van-white);
            --van-button-primary-background-color: var(--van-primary-color);
            --van-button-primary-border-color: var(--van-primary-color);
            --van-button-success-color: var(--van-white);
            --van-button-success-background-color: var(--van-success-color);
            --van-button-success-border-color: var(--van-success-color);
            --van-button-danger-color: var(--van-white);
            --van-button-danger-background-color: var(--van-danger-color);
            --van-button-danger-border-color: var(--van-danger-color);
            --van-button-warning-color: var(--van-white);
            --van-button-warning-background-color: var(--van-warning-color);
            --van-button-warning-border-color: var(--van-warning-color);
            --van-button-border-width: var(--van-border-width-base);
            --van-button-border-radius: var(--van-border-radius-sm);
            --van-button-round-border-radius: var(--van-border-radius-max);
            --van-button-plain-background-color: var(--van-white);
            --van-button-disabled-opacity: var(--van-disabled-opacity);
            --van-button-icon-size: 1.2em;
            --van-button-loading-icon-size: 20px;
            --van-nav-bar-height: 46px;
            --van-nav-bar-background-color: var(--van-background-color-light);
            --van-nav-bar-arrow-size: 16px;
            --van-nav-bar-icon-color: var(--van-primary-color);
            --van-nav-bar-text-color: var(--van-primary-color);
            --van-nav-bar-title-font-size: var(--van-font-size-lg);
            --van-nav-bar-title-text-color: var(--van-text-color);
            --van-nav-bar-z-index: 1;
            --van-image-placeholder-text-color: var(--van-text-color-2);
            --van-image-placeholder-font-size: var(--van-font-size-md);
            --van-image-placeholder-background-color: var(--van-background-color);
            --van-image-loading-icon-size: 32px;
            --van-image-loading-icon-color: var(--van-gray-4);
            --van-image-error-icon-size: 32px;
            --van-image-error-icon-color: var(--van-gray-4);
            --van-tag-padding: 0 var(--van-padding-base);
            --van-tag-text-color: var(--van-white);
            --van-tag-font-size: var(--van-font-size-sm);
            --van-tag-border-radius: 2px;
            --van-tag-line-height: 16px;
            --van-tag-medium-padding: 2px 6px;
            --van-tag-large-padding: var(--van-padding-base) var(--van-padding-xs);
            --van-tag-large-border-radius: var(--van-border-radius-md);
            --van-tag-large-font-size: var(--van-font-size-md);
            --van-tag-round-border-radius: var(--van-border-radius-max);
            --van-tag-danger-color: var(--van-danger-color);
            --van-tag-primary-color: var(--van-primary-color);
            --van-tag-success-color: var(--van-success-color);
            --van-tag-warning-color: var(--van-warning-color);
            --van-tag-default-color: var(--van-gray-6);
            --van-tag-plain-background-color: var(--van-background-color-light);
            --van-card-padding: var(--van-padding-xs) var(--van-padding-md);
            --van-card-font-size: var(--van-font-size-sm);
            --van-card-text-color: var(--van-text-color);
            --van-card-background-color: var(--van-gray-1);
            --van-card-thumb-size: 88px;
            --van-card-thumb-border-radius: var(--van-border-radius-lg);
            --van-card-title-line-height: 16px;
            --van-card-desc-color: var(--van-gray-7);
            --van-card-desc-line-height: var(--van-line-height-md);
            --van-card-price-color: var(--van-gray-8);
            --van-card-origin-price-color: var(--van-text-color-2);
            --van-card-num-color: var(--van-text-color-2);
            --van-card-origin-price-font-size: var(--van-font-size-xs);
            --van-card-price-font-size: var(--van-font-size-sm);
            --van-card-price-integer-font-size: var(--van-font-size-lg);
            --van-card-price-font-family: var(--van-price-integer-font-family);
            --van-checkbox-size: 20px;
            --van-checkbox-border-color: var(--van-gray-5);
            --van-checkbox-transition-duration: var(--van-animation-duration-fast);
            --van-checkbox-label-margin: var(--van-padding-xs);
            --van-checkbox-label-color: var(--van-text-color);
            --van-checkbox-checked-icon-color: var(--van-primary-color);
            --van-checkbox-disabled-icon-color: var(--van-gray-5);
            --van-checkbox-disabled-label-color: var(--van-text-color-3);
            --van-checkbox-disabled-background-color: var(--van-border-color);
            --van-overlay-z-index: 1;
            --van-overlay-background-color: rgba(0, 0, 0, 0.7);
            box-sizing: inherit;
            display: inline;
            padding: .2em .6em .3em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25em;
            background-color: #5bc0de;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }
    </style>

    <script>
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>

    <h1>Alle configuratie opties</h1> <?= $informatienognietafgemaakt ?>
    <div class="recent-orders">
        <table style="margin-right:1rem;">
            <thead>
                <tr>
                    <th style="width: 700%;">
                        <h2>Opties voor het intranet</h2>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <label class="label" style="color: white;">Nog geen configuratie opties</label>
                    </td>
                </tr>
            </tbody>
        </table>
        <div style="width:35%;float:right">
            <table style="width: 130%;float: right;position: relative;left: 5%;">
                <thead>
                    <tr>
                        <th style="width: 700%;">
                            <h2>Opties voor het MEOS</h2>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <label class="label" style="color: white;">Configuratie aanvullende afdelingen</label>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <table style="margin-right:1rem;">
            <thead>
                <tr>
                    <th style="width: 700%;">
                        <h2>Opties voor het GMS</h2>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <label class="label" style="color: white;">Configuratie aanvullende afdelingen</label>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td>
                        <div class="ibox-content">
                            <h3 style="text-align:center"></h3>
                            <div class="col-sm-6">
                                <div class="box">
                                    <div class="box-body">
                                        <div id="form-container">
                                            <table style="width:100%">
                                                <tr>
                                                    <th style="width:50%">Waarde</th>
                                                    <th style="width:25%">Pas aan</th>
                                                    <th style="width:25%">Verwijder</th>
                                                </tr>
                                            </table>
                                            <table style="width:100%" id="specialisaties-table">
                                                <?php
                                                $getSpecialisaties = $db->query("SELECT * FROM gms_eenheden_aanvullend");
                                                while ($fetchSpecialisaties = $getSpecialisaties->fetch_assoc()) { ?>
                                                    <tr>
                                                        <form id="bewerkConfiguratieSpecialisatie1_<?= $fetchSpecialisaties["id"] ?>" class="bewerkConfiguratieSpecialisatieForm" method="POST">
                                                            <td style='display:none'><input type='text' name='id' style='display:none' value="<?= $fetchSpecialisaties["id"] ?>"></td>
                                                            <td style='width:50%'><input type='text' name='specialisatienaam' value="<?= $fetchSpecialisaties["naam"] ?>"></td>
                                                            <td style='width:25%'><input class='button is-success is-focused nieuw edit-button' type="submit" name="bewerkConfiguratieSpecialisatie1" value="Pas aan"></td>
                                                        </form>
                                                        <form id="bewerkConfiguratieSpecialisatie2_<?= $fetchSpecialisaties["id"] ?>" class="bewerkConfiguratieSpecialisatieForm" method="POST">
                                                            <td style='display:none'><input type='text' name='id' style='display:none' value="<?= $fetchSpecialisaties["id"] ?>"></td>
                                                            <td style='width:25%'><input class='button is-success is-focused nieuw edit-button' type="submit" name="bewerkConfiguratieSpecialisatie2" value="Verwijder"></td>
                                                        </form>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                            <form id="voegConfiguratieSpecialisatie">
                                                <table style="width:100%">
                                                    <tr>
                                                        <td style='display:none'></td>
                                                        <td><input type='text' name='column1' placeholder="Nieuwe aanvulling"></td>
                                                        <td><input type="submit" value="Voeg toe"></td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <script>
        $(document).ready(function() {
            $('#add-form').submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: 'https://<?= $_SERVER['SERVER_NAME'] ?>/includes/class.post.php?id=1',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        if (response.status === 'success') {
                            $('#add-form').get(0).reset();
                            toastr.success('New row added successfully', 'Success');
                            refreshTable();
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
            $(document).on('click', '.edit-button', function() {
                var $row = $(this).closest('tr');
                var id = $row.find('td:eq(0)').text();
                var value = $row.find('td:eq(1) input[type="text"]').val();
                var formData = new FormData();
                formData.append('id', id);
                formData.append('value', value);
                $.ajax({
                    url: 'https://<?= $_SERVER['SERVER_NAME'] ?>/includes/class.post.php?id=3',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        if (response.status === 'success') {
                            toastr.success('Value updated successfully', 'Success');
                            refreshTable();
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            function refreshTable() {
                $.ajax({
                    url: 'https://<?= $_SERVER['SERVER_NAME'] ?>/includes/class.post.php?id=2',
                    type: 'GET',
                    dataType: 'html',
                    success: function(data) {
                        $('#specialisaties-table').html(data);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        });
    </script>
<?php }
?>