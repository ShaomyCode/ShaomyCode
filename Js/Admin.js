function tenants(){

	var openModal = document.getElementById('Tenants');
	openModal.showModal();
}

function openRes(){
	var openModal = document.getElementById('res');
	openModal.showModal();
}

function closeBuilding(){
	var closeModal = document.getElementById('res');
	closeModal.close();
}
function closeModal(){
	var closeTenants = document.getElementById('Tenants');
	closeTenants.close();

}


function closeUpdate(){
	var closeUpdate = document.getElementById('Update');
	closeUpdate.close();
}
function update(){

	var openModal = document.getElementById('Update');
	var closeModal = document.getElementById('Tenants');
	openModal.showModal();
	// closeModal.close();
}

function fillup(){
	var openModal = document.getElementById('Fillmeup');
	openModal.showModal();
}