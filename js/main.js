const openModal = document.querySelector(".delete-button");
const closeModal = document.querySelector(".cancel-button");
const Modal = document.querySelector(".permission-modal");

openModal.addEventListener("click", () => {
    Modal.showModal();
})

closeModal.addEventListener("click", () => {
    Modal.close();
})