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

function dequeue(id) {
	QueueComponent.delete(id);
}

$('.aircraft-detail').submit(function (e) {
    e.preventDefault();
    AircraftComponent.onsubmit(this);
});

function onclickAction(e) {
    e.stopPropagation();
}