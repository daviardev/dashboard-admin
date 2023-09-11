import { $ } from './dom.js'

const modal = $('#modal')
const openModalBtn = $('#openModalBtn')
const closeModalBtn = $('#closeModalBtn')

const modalEdit = $('#modalEdit')
const openModalEdit = $('#openModalEdit')
const closeModalEdit = $('#closeModalEdit')


// Open table modal
openModalBtn.addEventListener('click', () => {
    modal.style.display = 'flex'
})

closeModalBtn.addEventListener('click', () => {
    modal.style.display = 'none'
})

window.addEventListener('click', e => {
    if (e.target === modal) {
        modal.style.display = 'none'
    }
})

// Open edit modal
openModalEdit.addEventListener('click', () => {
    
})