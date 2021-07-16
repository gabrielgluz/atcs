class Queue {

    constructor(){
        this.queue = {};
    }

    init() {
        this.get();
    }

    renderList(data) {
        const list = $('#queue-list');

        list.html('');
        data.map((elem, index) => {
            list.append($(`
                <div class="card-aircraft col-12 col-sm-6 col-lg-4 col-xl-3">
                    <div class="aircraft-body">
                        <p class="aircraft-name"><strong>Dequeue Priority: ${index + 1}</strong></p>
                        <p class="aircraft-name">${elem.name ?? 'Unknown'}</p>
                        <p class="aircraft-name">${elem.type ?? 'Unknown'} - ${elem.size ?? 'Unknown'}</p>
                        <p class="aircraft-name">${elem.enqueued_at_formatted ?? 'Unknown'}</p>
                    </div>
                </div>
            `));
        });
    }

    get() {
        $.ajax({
            url: '/queues',
            type: 'GET',
            dataType: 'json'
        })
        .done(this.renderList)
        .fail((error) => {
            return error;
        });
    }

    create(id) {

        this.queue = {aircraft_id: id}

        $.ajax({
            url: '/queues',
            type: 'POST',
            contentType: 'application/json',
            dataType: 'json',
            data: JSON.stringify(this.queue),
        })
        .done((json) => {
            if(json){
                this.init();
                AircraftComponent.init();
                alert2('Success', json.message, {
                    icon: 'success',
                    confirmText: 'OK'
                });
            }
        })
        .fail((error) => {
            if(error.status === 422){
                alert2('Whoops!','Check the required fields', {
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
        alert2('Attention!', 'Do you really want to Dequeue?', {
            icon: 'warning',
            confirmText: 'Yes, dequeue',
            cancelText: 'No, cancel'
        }, () => {
            $.ajax({
                url: '/queues',
                type: 'DELETE',
                dataType: 'json',
            })
            .done((json) => {
                if(json){
                    this.init();
                    AircraftComponent.init();
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
