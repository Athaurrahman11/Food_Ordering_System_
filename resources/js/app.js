import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', function () {

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form or delete action here
                this.closest("form").submit();
            }
        });

    });
});



        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.ajax-cart-form');
            
            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const formData = new FormData(this);
                    const button = this.querySelector('button');
                    const originalContent = button.innerHTML;
                    
                    // Loading State
                    button.disabled = true;
                    button.innerHTML = '<span class="material-symbols-outlined animate-spin text-sm">progress_activity</span>';
                    
                    fetch(this.action, {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update Cart Count
                            const cartCounters = document.querySelectorAll('.cart-count');
                            cartCounters.forEach(counter => {
                                counter.textContent = data.cartCount;
                                counter.classList.remove('hidden');
                            });
                            
                            // Show Toast
                            showToast(data.message, 'success');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showToast('Something went wrong', 'error');
                    })
                    .finally(() => {
                        // Reset Button
                        button.disabled = false;
                        button.innerHTML = originalContent;
                    });
                });
            });
        });

        function showToast(message, type = 'success') {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            
            // Toast Styling
            const colors = type === 'success' ? 'bg-slate-900 border-l-4 border-[#f48c25]' : 'bg-red-600 border-l-4 border-white';
            const icon = type === 'success' ? 'check_circle' : 'error';
            
            toast.className = `${colors} text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-3 transform translate-y-20 opacity-0 transition-all duration-500 pointer-events-auto min-w-[300px]`;
            toast.innerHTML = `
                <span class="material-symbols-outlined text-[#f48c25]">${icon}</span>
                <p class="font-bold text-sm bg-transparent">${message}</p>
            `;
            
            container.appendChild(toast);
            
            // Animate In
            requestAnimationFrame(() => {
                toast.classList.remove('translate-y-20', 'opacity-0');
            });
            
            // Remove after 3s
            setTimeout(() => {
                toast.classList.add('translate-y-20', 'opacity-0');
                setTimeout(() => toast.remove(), 500);
            }, 3000);
        }