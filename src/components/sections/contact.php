<!-- Contact Section -->
<section id="contact" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16 slide-up">
            <div class="flex items-center justify-center gap-2 mb-4">
                <span class="w-10 h-[2px] bg-green-500"></span>
                <span class="uppercase text-xs font-bold tracking-[0.2em] text-green-500">Contact</span>
                <span class="w-10 h-[2px] bg-green-500"></span>
            </div>
            <h2 class="text-4xl md:text-6xl font-black text-[#001c37] mb-6">Contactez-<span class="text-green-500">nous</span></h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Notre équipe est disponible pour répondre à toutes vos questions</p>
        </div>

        <!-- Contact Info Cards -->
        <div class="grid md:grid-cols-3 gap-8 mb-16">
            <div class="text-center p-8 bg-gray-50 rounded-lg slide-up">
                <div class="w-16 h-16 bg-green-500 rounded-lg flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-[#001c37] mb-4">Téléphone</h3>
                <p class="text-gray-600 mb-2">+223 70 70 70 70</p>
                <p class="text-gray-600">+223 20 20 20 20</p>
            </div>

            <div class="text-center p-8 bg-gray-50 rounded-lg slide-up">
                <div class="w-16 h-16 bg-green-500 rounded-lg flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-[#001c37] mb-4">Email</h3>
                <p class="text-gray-600">contact@africa-tech.com</p>
            </div>

            <div class="text-center p-8 bg-gray-50 rounded-lg slide-up">
                <div class="w-16 h-16 bg-green-500 rounded-lg flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-[#001c37] mb-4">Adresse</h3>
                <p class="text-gray-600">Faladie Sema<br>Bamako - Mali</p>
            </div>
        </div>

        <!-- Form and Map Section -->
        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="slide-up">
                <h3 class="text-3xl font-black text-[#001c37] mb-6">Envoyez-nous un message</h3>
                <p class="text-gray-600 mb-8">Remplissez le formulaire ci-dessous et nous vous répondrons dans les plus brefs délais.</p>
                
                <form id="contact-form" class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-bold text-[#001c37] mb-2">
                            Nom complet <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                            placeholder="Votre nom"
                        >
                        <span class="text-red-500 text-sm hidden" id="name-error"></span>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-bold text-[#001c37] mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                            placeholder="votre@email.com"
                        >
                        <span class="text-red-500 text-sm hidden" id="email-error"></span>
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-bold text-[#001c37] mb-2">
                            Téléphone
                        </label>
                        <input 
                            type="tel" 
                            id="phone" 
                            name="phone"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                            placeholder="+223 XX XX XX XX"
                        >
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-bold text-[#001c37] mb-2">
                            Sujet <span class="text-red-500">*</span>
                        </label>
                        <select 
                            id="subject" 
                            name="subject" 
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                        >
                            <option value="">Sélectionnez un sujet</option>
                            <option value="devis">Demande de devis</option>
                            <option value="installation">Installation solaire</option>
                            <option value="maintenance">Maintenance</option>
                            <option value="formation">Formation</option>
                            <option value="produit">Information sur un produit</option>
                            <option value="autre">Autre</option>
                        </select>
                        <span class="text-red-500 text-sm hidden" id="subject-error"></span>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-bold text-[#001c37] mb-2">
                            Message <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            id="message" 
                            name="message" 
                            rows="6" 
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all resize-none"
                            placeholder="Décrivez votre projet ou votre demande..."
                        ></textarea>
                        <span class="text-red-500 text-sm hidden" id="message-error"></span>
                    </div>

                    <button 
                        type="submit" 
                        id="submit-btn"
                        class="w-full bg-green-500 text-white px-8 py-4 rounded-lg font-bold uppercase text-sm hover:bg-green-600 transition-all shadow-lg hover:shadow-xl transform hover:scale-[1.02]"
                    >
                        <span id="submit-text">Envoyer le message</span>
                        <span id="submit-loading" class="hidden">Envoi en cours...</span>
                    </button>

                    <div id="form-success" class="hidden p-4 bg-green-50 border border-green-200 rounded-lg">
                        <p class="text-green-800 font-semibold flex items-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Message envoyé avec succès ! Nous vous répondrons bientôt.
                        </p>
                    </div>

                    <div id="form-error" class="hidden p-4 bg-red-50 border border-red-200 rounded-lg">
                        <p class="text-red-800 font-semibold flex items-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                            Une erreur s'est produite. Veuillez réessayer ou nous contacter directement.
                        </p>
                    </div>
                </form>
            </div>

            <!-- Map Section -->
            <div class="slide-up">
                <h3 class="text-3xl font-black text-[#001c37] mb-6">Notre localisation</h3>
                <p class="text-gray-600 mb-8">Venez nous rendre visite à notre bureau situé à Faladie Sema, Bamako.</p>
                
                <!-- Google Maps Embed -->
                <div class="rounded-lg overflow-hidden shadow-lg h-[500px] border border-gray-200">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3859.5!2d-8.0027!3d12.6392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTLCsDM4JzIxLjEiTiA4wrAwMCcwOS43Ilc!5e0!3m2!1sfr!2sml!4v1234567890123!5m2!1sfr!2sml"
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        class="w-full h-full"
                        title="Localisation AFRICIA TECH - Faladie Sema, Bamako, Mali"
                    ></iframe>
                </div>

                <!-- Map Info -->
                <div class="mt-6 p-6 bg-gray-50 rounded-lg">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-[#001c37] mb-2">Adresse complète</h4>
                            <p class="text-gray-600 mb-1">Faladie Sema</p>
                            <p class="text-gray-600">Bamako, Mali</p>
                            <a 
                                href="https://www.google.com/maps/search/?api=1&query=Faladie+Sema+Bamako+Mali" 
                                target="_blank" 
                                rel="noopener"
                                class="inline-block mt-3 text-green-500 hover:text-green-600 font-semibold text-sm transition-colors"
                            >
                                Ouvrir dans Google Maps →
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Contact form handling
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('contact-form');
    const submitBtn = document.getElementById('submit-btn');
    const submitText = document.getElementById('submit-text');
    const submitLoading = document.getElementById('submit-loading');
    const formSuccess = document.getElementById('form-success');
    const formError = document.getElementById('form-error');

    if (!form) return;

    // Reset messages
    function resetMessages() {
        formSuccess.classList.add('hidden');
        formError.classList.add('hidden');
        document.querySelectorAll('.text-red-500.text-sm').forEach(el => {
            el.classList.add('hidden');
            el.textContent = '';
        });
    }

    // Validate form
    function validateForm() {
        let isValid = true;
        resetMessages();

        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const subject = document.getElementById('subject').value;
        const message = document.getElementById('message').value.trim();

        // Validate name
        if (!name || name.length < 2) {
            const errorEl = document.getElementById('name-error');
            errorEl.textContent = 'Le nom doit contenir au moins 2 caractères';
            errorEl.classList.remove('hidden');
            isValid = false;
        }

        // Validate email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!email || !emailRegex.test(email)) {
            const errorEl = document.getElementById('email-error');
            errorEl.textContent = 'Veuillez entrer une adresse email valide';
            errorEl.classList.remove('hidden');
            isValid = false;
        }

        // Validate subject
        if (!subject) {
            const errorEl = document.getElementById('subject-error');
            errorEl.textContent = 'Veuillez sélectionner un sujet';
            errorEl.classList.remove('hidden');
            isValid = false;
        }

        // Validate message
        if (!message || message.length < 10) {
            const errorEl = document.getElementById('message-error');
            errorEl.textContent = 'Le message doit contenir au moins 10 caractères';
            errorEl.classList.remove('hidden');
            isValid = false;
        }

        return isValid;
    }

    // Handle form submission
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        if (!validateForm()) {
            return;
        }

        // Show loading state
        submitBtn.disabled = true;
        submitText.classList.add('hidden');
        submitLoading.classList.remove('hidden');
        resetMessages();

        // Get form data
        const formData = {
            name: document.getElementById('name').value.trim(),
            email: document.getElementById('email').value.trim(),
            phone: document.getElementById('phone').value.trim(),
            subject: document.getElementById('subject').value,
            message: document.getElementById('message').value.trim()
        };

        try {
            // Send form data to server
            const response = await fetch('api/contact.php', {
                method: 'POST',
                headers: { 
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData)
            });

            const result = await response.json();
            
            if (!response.ok || !result.success) {
                throw new Error(result.message || 'Erreur serveur');
            }

            // Success
            formSuccess.classList.remove('hidden');
            form.reset();
            
            // Scroll to success message
            formSuccess.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

            // Optionally redirect to WhatsApp with pre-filled message
            // const whatsappMessage = encodeURIComponent(
            //     `Bonjour, je viens de vous envoyer un message via votre site web.\n\n` +
            //     `Nom: ${formData.name}\n` +
            //     `Email: ${formData.email}\n` +
            //     `Téléphone: ${formData.phone || 'Non renseigné'}\n` +
            //     `Sujet: ${formData.subject}\n\n` +
            //     `Message: ${formData.message}`
            // );
            // window.open(`https://wa.me/22370707070?text=${whatsappMessage}`, '_blank');

        } catch (error) {
            console.error('Form submission error:', error);
            formError.classList.remove('hidden');
            formError.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        } finally {
            // Reset button state
            submitBtn.disabled = false;
            submitText.classList.remove('hidden');
            submitLoading.classList.add('hidden');
        }
    });

    // Real-time validation on blur
    ['name', 'email', 'message'].forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field) {
            field.addEventListener('blur', () => {
                validateForm();
            });
        }
    });
});
</script>
