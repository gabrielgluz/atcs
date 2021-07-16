class Aircraft {

    constructor(){
        this.aircraft = {};
    }

    init() {
        this.get();
    }

    newAircraft () {
        this.aircraft = {};
        this.render();
    }

    show(id) {
        $.ajax({
            url: '/aircrafts/' + id,
            dataType: 'json',
            type: 'GET'
        })
        .done((aircraft) => {
            this.aircraft = aircraft;
            this.render();
        })
        .fail((error) => {
            return error;
        });
    }

    render(){
        const self = this;

        $('#aircraft-modal [name="id"]').val(this.aircraft.id ?? '');

        $('#aircraft-modal [name="name"]').val(this.aircraft.name ?? '').keyup(function () {
            self.aircraft.name = $(this).val();
            console.log(self.aircraft);
        });

        $('#aircraft-modal [name="type"]').val(this.aircraft.type ?? '').change(function () {
            self.aircraft.type = $(this).val();
        });

        $('#aircraft-modal [name="size"]').val(this.aircraft.size ?? '').change(function () {
            self.aircraft.size = $(this).val();
        });

        $('.aircraft-footer .btn-danger').toggle(('id' in this.aircraft && this.aircraft.id) ? true : false);

        $('#aircraft-modal').modal('show');
    }

    renderList(data) {
        const list = $('#aircraft-list');

        list.html('');
        data.map((elem) => {
            list.append($(`
                <div class="card-aircraft col-12 col-sm-6 col-lg-4 col-xl-3">
                    <div class="aircraft-body">
                        <div onclick="openAircraft(${elem.id})">
                        <p class="aircraft-name">${elem.name ?? 'Unknown'}</p>
                        <p class="aircraft-name">${elem.type ?? 'Unknown'} - ${elem.size ?? 'Unknown'}</p>
                        </div>
                        <div class="aircraft-links">
                            <a href="#" onclick="enqueue(${elem.id})">Enqueue Aircraft</a>
                        </div>
                    </div>
                </div>
            `));
        });
    }

    onsubmit(form){
        if('id' in this.aircraft) {
            this.update();
        } else {
            this.create();
        }
    }

    get() {
        $.ajax({
            url: '/aircrafts',
            type: 'GET',
            dataType: 'json'
        })
        .done(this.renderList)
        .fail((error) => {
            return error;
        });
    }

    update() {
        $.ajax({
            url: '/aircrafts/' + this.aircraft.id,
            type: 'PUT',
            contentType: 'application/json',
            dataType: 'json',
            data: JSON.stringify(this.aircraft),
        })
        .done((json) => {
            if(json){
                $('#aircraft-modal').modal('hide');
                this.init();
                alert2('Success', json.message, {
                    icon: 'success',
                    confirmText: 'OK'
                });
            }
        })
        .fail((error) => {
            if(error.status === 422){
                alert2('Whoops!','All the fields are required', {
                    icon: 'error',
                    confirmText: 'OK'
                });
            } else {
                alert2('Whoops!', error.responseJSON.message, {
                    icon: 'error',
                    confirmText: 'OK'
                });
            }
        });
    }

    create() {
        $.ajax({
            url: '/aircrafts',
            type: 'POST',
            contentType: 'application/json',
            dataType: 'json',
            data: JSON.stringify(this.aircraft),
        })
        .done((json) => {
            if(json){
                $('#aircraft-modal').modal('hide');
                this.init();
                alert2('Success', json.message, {
                    icon: 'success',
                    confirmText: 'OK'
                });
            }
        })
        .fail((error) => {
            if(error.status === 422){
                alert2('Whoops!','All the fields are required', {
                    icon: 'error',
                    confirmText: 'OK'
                });
            } else {
                alert2('Whoops!', error.responseJSON.message, {
                    icon: 'error',
                    confirmText: 'OK'
                });
            }
        });
    }

    delete() {
        alert2('Attention!', 'Do you really want to delete the Aircraft?', {
            icon: 'warning',
            confirmText: 'Yes, delete',
            cancelText: 'No, cancel'
        }, () => {
            $.ajax({
                url: '/aircrafts/' + this.aircraft.id,
                type: 'DELETE',
                dataType: 'json',
            })
            .done((json) => {
                if(json){
                    $('#aircraft-modal').modal('hide');
                    this.init();
                    alert2('success!', json.message, {
                        icon: 'success',
                        confirmText: 'OK'
                    });
                }
            })
            .fail((error) => {
                alert2('Whoops!', error.responseJSON.message, {
                    icon: 'error',
                    confirmText: 'OK'
                });
            });
        });
    }
}
