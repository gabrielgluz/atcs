const AircraftComponent = new Aircraft();
AircraftComponent.init();

function newAircraft() {
    AircraftComponent.newAircraft();
}

function deleteAircraft() {
    AircraftComponent.delete();
}

function openAircraft(id) {
    AircraftComponent.show(id);
}

$('.aircraft-detail').submit(function (e) {
    e.preventDefault();
    AircraftComponent.onsubmit(this);
});

function onclickAction(e) {
    e.stopPropagation();
}