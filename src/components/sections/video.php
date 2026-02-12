<!-- Video Section with Parallax Effect -->
<section id="video" class="relative py-32 overflow-hidden">
    <!-- Parallax background -->
    <div class="absolute inset-0 parallax">
        <img src="../assets/images/video-bg.jpeg" 
             alt="Installation solaire en cours" 
             class="w-full h-full object-cover" 
             loading="lazy">
        <div class="absolute inset-0 bg-gradient-to-r from-[#001c37]/90 via-[#001c37]/80 to-[#001c37]/90"></div>
    </div>

    <!-- Content overlay -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 text-center text-white fade-in">
        <div class="flex items-center justify-center gap-2 mb-6">
            <span class="w-10 h-[2px] bg-yellow-400"></span>
            <span class="uppercase text-xs font-bold tracking-[0.2em] text-yellow-400">Découvrez notre expertise</span>
            <span class="w-10 h-[2px] bg-yellow-400"></span>
        </div>

        <h2 class="text-4xl md:text-6xl font-black mb-8">
            AFRICIA TECH <span class="text-yellow-400">en action</span>
        </h2>

        <p class="text-xl text-gray-300 mb-12 max-w-3xl mx-auto">
            Découvrez nos réalisations et notre savoir-faire à travers cette vidéo présentant nos installations solaires et notre expertise technique.
        </p>

        <!-- Video container with play button overlay -->
        <div class="relative max-w-4xl mx-auto rounded-lg overflow-hidden shadow-2xl slide-up">
            <div class="aspect-video bg-black flex items-center justify-center relative group" id="video-container">
                <!-- Thumbnail + play overlay (hidden when video is playing) -->
                <div id="video-poster" class="absolute inset-0 z-10 flex flex-col items-center justify-center cursor-pointer">
                    <img src="assets/images/laanding-video-thumbail.jpeg" 
                         alt="Vidéo de présentation AFRICIA TECH - installations solaires" 
                         class="absolute inset-0 w-full h-full object-cover opacity-70 group-hover:opacity-80 transition-opacity"
                         loading="lazy">
                    <div class="relative z-10 flex flex-col items-center pointer-events-none">
                        <div class="w-24 h-24 bg-yellow-400 rounded-full flex items-center justify-center mb-4 group-hover:bg-yellow-500 transition-all shadow-lg group-hover:scale-110 transform duration-300">
                            <svg class="w-12 h-12 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z" />
                            </svg>
                        </div>
                        <p class="text-white font-semibold text-lg">Regarder la vidéo</p>
                    </div>
                </div>

                <!-- HTML5 Video with controls (play, pause, seek, volume, fullscreen) -->
                <video id="section-video" 
                       class="absolute inset-0 w-full h-full object-contain bg-black" 
                       src="assets/videos/presentation.mp4" 
                       controls 
                       controlsList="nodownload"
                       playsinline
                       preload="metadata">
                    Votre navigateur ne prend pas en charge la lecture de vidéos.
                </video>

                <!-- Download button (visible when video is shown) -->
                <a id="video-download-btn" 
                   href="assets/videos/presentation.mp4" 
                   download="AFRICIA-TECH-presentation.mp4" 
                   class="hidden absolute top-4 right-4 z-20 px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-white text-sm font-semibold rounded-lg shadow-lg transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Télécharger
                </a>
            </div>
        </div>

        <script>
            (function() {
                var container = document.getElementById('video-container');
                var poster = document.getElementById('video-poster');
                var video = document.getElementById('section-video');
                var downloadBtn = document.getElementById('video-download-btn');
                if (!container || !poster || !video) return;
                poster.addEventListener('click', function() {
                    poster.classList.add('hidden');
                    downloadBtn.classList.remove('hidden');
                    video.play();
                });
            })();
        </script>

        <!-- Video description -->
        <div class="mt-12 grid md:grid-cols-3 gap-8 max-w-4xl mx-auto slide-up">
            <div class="text-center">
                <div class="text-3xl font-black text-yellow-400 mb-2">100+</div>
                <div class="text-gray-300 text-sm">Installations réalisées</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-black text-yellow-400 mb-2">5+</div>
                <div class="text-gray-300 text-sm">Années d'expérience</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-black text-yellow-400 mb-2">24/7</div>
                <div class="text-gray-300 text-sm">Support disponible</div>
            </div>
        </div>
    </div>
</section>

