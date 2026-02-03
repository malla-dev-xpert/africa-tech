<!-- Video Section with Parallax Effect -->
<section id="video" class="relative py-32 overflow-hidden">
    <!-- Parallax background -->
    <div class="absolute inset-0 parallax">
        <img src="https://images.unsplash.com/photo-1466611653911-95081537e5b7?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" 
             alt="Installation solaire en cours" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-[#001c37]/90 via-[#001c37]/80 to-[#001c37]/90"></div>
    </div>

    <!-- Content overlay -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 text-center text-white fade-in">
        <div class="flex items-center justify-center gap-2 mb-6">
            <span class="w-10 h-[2px] bg-green-500"></span>
            <span class="uppercase text-xs font-bold tracking-[0.2em] text-green-500">Découvrez notre expertise</span>
            <span class="w-10 h-[2px] bg-green-500"></span>
        </div>

        <h2 class="text-4xl md:text-6xl font-black mb-8">
            AFRICIA TECH <span class="text-green-500">en action</span>
        </h2>

        <p class="text-xl text-gray-300 mb-12 max-w-3xl mx-auto">
            Découvrez nos réalisations et notre savoir-faire à travers cette vidéo présentant nos installations solaires et notre expertise technique.
        </p>

        <!-- Video container with play button overlay -->
        <div class="relative max-w-4xl mx-auto rounded-lg overflow-hidden shadow-2xl slide-up">
            <div class="aspect-video bg-black/50 flex items-center justify-center relative group cursor-pointer" id="video-container">
                <!-- Thumbnail image -->
                <img src="https://images.unsplash.com/photo-1509391366360-2e959784a276?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" 
                     alt="Vidéo AFRICIA TECH" 
                     class="absolute inset-0 w-full h-full object-cover opacity-70 group-hover:opacity-80 transition-opacity">
                
                <!-- Play button overlay -->
                <div class="relative z-10 flex flex-col items-center">
                    <div class="w-24 h-24 bg-green-500 rounded-full flex items-center justify-center mb-4 group-hover:bg-green-600 transition-all shadow-lg group-hover:scale-110 transform duration-300">
                        <svg class="w-12 h-12 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z" />
                        </svg>
                    </div>
                    <p class="text-white font-semibold text-lg">Regarder la vidéo</p>
                </div>

                <!-- Video iframe (hidden by default, shown on click) -->
                <iframe id="video-iframe" 
                        class="hidden absolute inset-0 w-full h-full" 
                        src="" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                </iframe>
            </div>
        </div>

        <!-- Video description -->
        <div class="mt-12 grid md:grid-cols-3 gap-8 max-w-4xl mx-auto slide-up">
            <div class="text-center">
                <div class="text-3xl font-black text-green-500 mb-2">100+</div>
                <div class="text-gray-300 text-sm">Installations réalisées</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-black text-green-500 mb-2">5+</div>
                <div class="text-gray-300 text-sm">Années d'expérience</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-black text-green-500 mb-2">24/7</div>
                <div class="text-gray-300 text-sm">Support disponible</div>
            </div>
        </div>
    </div>
</section>

