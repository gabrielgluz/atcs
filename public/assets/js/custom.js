const SystemComponent = new System();
SystemComponent.init();

const AircraftComponent = new Aircraft();
AircraftComponent.init();

const QueueComponent = new Queue();
QueueComponent.init();

function newAircraft() {
    AircraftComponent.newAircraft();
}

function deleteAircraft() {
    AircraftComponent.delete();
}

function openAircraft(id) {
    AircraftComponent.show(id);
}

function enqueue(id) {
	QueueComponent.create(id);
}

function dequeue() {
	QueueComponent.delete();
}

function boot() {
	SystemComponent.update();
}

$('.aircraft-detail').submit(function (e) {
    e.preventDefault();
    AircraftComponent.onsubmit(this);
});

function onclickAction(e) {
    e.stopPropagation();
}