import { $ } from './dom.js'

const modal = $('#modal')
const openModalBtn = $('#openModalBtn')
const closeModalBtn = $('#closeModalBtn')


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