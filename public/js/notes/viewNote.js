function toggleDeleteModal(state){
    var deleteModal = document.getElementById("delete-modal");

    if(state){
        deleteModal.className = "modal-wrapper open";
    }else{
        deleteModal.className = "modal-wrapper";
    }
}
