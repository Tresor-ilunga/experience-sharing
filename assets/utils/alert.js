import Swal from 'sweetalert2'

export const toastSwalMixin = Swal.mixin({
    toast: true,
    position: 'top-end',
    timer: 30000,
    showCloseButton: true,
    timerProgressBar: true,
    showConfirmButton: false,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer);
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

export const toast = async (type, message, timer= 30000) => {
    await toastSwalMixin.fire({
        timer: timer,
        icon: type,
        html: message
    })
};