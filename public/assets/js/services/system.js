class System {

    init() {
        this.get();
    }

    update() {
        $.ajax({
            url: '/systems',
            type: 'PUT',
            contentType: 'application/json',
            dataType: 'json',
        })
        .done((json) => {
            if(json){
                this.init();
                alert2('Success', json.message, {
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
    }

    get() {
        $.ajax({
            url: '/systems',
            type: 'GET',
            dataType: 'json'
        })
        .done((json) => {
            if(json){
                $('.boot-label').html(json.label)
            }
        })
        .fail((error) => {
            return error;
        });
    }

}
