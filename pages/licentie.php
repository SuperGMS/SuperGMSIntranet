<div class="padding">
    <div class="box" style="border-radius:10px 10px;">
        <div class="col-md-12">
            <div class="box" style="border-radius:10px;">
                <div class="box-header">
                    <span class="label label-danger pull-right">
                    </span>
                    <h5>Licentie informatie</h5>
                </div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    <form action="" method="POST">
                        <div class="ibox-content">
                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Licentie status:</label>
                                <input type="text" value="<?= $result2['status']; ?>" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Licentie zelf:</label>
                                <input type="text" value="<?= $licensekey; ?>" class="form-control" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="box-divider m-a-0"></div>
                <div class="box-body">
                    <h5>Wat houd dit precies in?</h5>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                    <script>
                        var triggerTabList = [].slice.call(document.querySelectorAll('#myTab a'))
                        triggerTabList.forEach(function(triggerEl) {
                            var tabTrigger = new bootstrap.Tab(triggerEl)

                            triggerEl.addEventListener('click', function(event) {
                                event.preventDefault()
                                tabTrigger.show()
                            })
                        })
                    </script>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">Licentie status</a>
                                <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="list-profile">Licentie zelf</a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                                    Een licentiestatus verwijst naar de huidige staat of conditie van een licentie, waarbij wordt aangegeven of deze geldig, verlopen of geschorst is.
                                    <br />
                                    <br />
                                    <ul>
                                        <li>Active / Reissued: Een licentie die momenteel actief is en legaal kan worden gebruikt.</li>
                                        <ol>- Indien dit staat bij de "Licentie status", hoef je niets te doen. De licentie is weer up-to-date.</ol>
                                        <br />
                                        <li>Suspended: Een licentie die de vervaldatum heeft bereikt en niet meer kan worden gebruikt.</li>
                                        <ol>- Indien dit staat bij de "Licentie status", is het hoogst waarschijnlijk dat jij je factuur niet hebt betaald. Indien je deze betaald en de pagina ververst, zou de licentie weer op "Active" of "Reissued" staan.</ol>
                                        <br />
                                        <li>Expired: Een licentie die is geschorst en waarbij de licentiehouder tijdens de schorsingsperiode geen gebruik kan maken van de licentie.</li>
                                        <ol>- Indien dit staat bij de "Licentie status", raden wij jou zeer sterk aan om een ticket aan te maken op <a href="https://client.jhosting.be/">https://client.jhosting.be/</a> om achter de reden te komen waarom jouw licentie is verlopen.</ol>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">Dit is de licentie die je eventueel in de ticket kan aangeven om hulp te krijgen.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>