// Image Popup JavaScript - Old School Theme
(function() {
    'use strict';
    
    // Image Popup Class
    function ImagePopup() {
        this.overlay = null;
        this.container = null;
        this.isOpen = false;
        this.init();
    }
    
    ImagePopup.prototype.init = function() {
        this.createPopupElements();
        this.bindEvents();
    };
    
    ImagePopup.prototype.createPopupElements = function() {
        // Create overlay
        this.overlay = document.createElement('div');
        this.overlay.className = 'image-popup-overlay';
        this.overlay.id = 'image-popup-overlay';
        
        // Create container
        this.container = document.createElement('div');
        this.container.className = 'image-popup-container';
        this.container.id = 'image-popup-container';
        
        // Create header
        var header = document.createElement('div');
        header.className = 'image-popup-header';
        
        var title = document.createElement('h3');
        title.className = 'image-popup-title';
        title.id = 'image-popup-title';
        title.textContent = 'Media Viewer';
        
        var closeBtn = document.createElement('button');
        closeBtn.className = 'image-popup-close';
        closeBtn.innerHTML = '×';
        closeBtn.setAttribute('aria-label', 'Close');
        
        header.appendChild(title);
        header.appendChild(closeBtn);
        
        // Create content
        var content = document.createElement('div');
        content.className = 'image-popup-content';
        content.id = 'image-popup-content';
        
        this.container.appendChild(header);
        this.container.appendChild(content);
        
        // Add to DOM
        document.body.appendChild(this.overlay);
        document.body.appendChild(this.container);
    };
    
    ImagePopup.prototype.bindEvents = function() {
        var self = this;
        
        // Close button click
        this.container.querySelector('.image-popup-close').addEventListener('click', function() {
            self.close();
        });
        
        // Overlay click to close
        this.overlay.addEventListener('click', function(e) {
            if (e.target === self.overlay) {
                self.close();
            }
        });
        
        // ESC key to close
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && self.isOpen) {
                self.close();
            }
        });
        
        // Bind to image and video links
        this.bindImageLinks();
        this.bindVideoLinks();
    };
    
    ImagePopup.prototype.bindImageLinks = function() {
        var self = this;
        
        // Function to bind links
        function bindLinks() {
            var links = document.querySelectorAll('a[href*="images/respawn/"]');
            
            links.forEach(function(link) {
                if (!link.classList.contains('image-popup-bound')) {
                    link.classList.add('image-popup-bound');
                    link.classList.add('image-link');
                    
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        var imageSrc = link.href;
                        var title = link.textContent.trim() || 'Respawn Image';
                        var description = link.getAttribute('data-description') || '';
                        
                        if (imageSrc) {
                            self.open(imageSrc, title, description);
                        } else {
                            // Fallback to original link if no image src found
                            window.open(link.href, '_blank');
                        }
                    });
                }
            });
        }
        
        // Bind on load
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', bindLinks);
        } else {
            bindLinks();
        }
        
        // Bind for dynamically added content
        var observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === 'childList') {
                    bindLinks();
                }
            });
        });
        
        observer.observe(document.body, {
            childList: true,
            subtree: true
        });
    };

    // Bind anchors that should open a YouTube video in the same popup
    ImagePopup.prototype.bindVideoLinks = function() {
        var self = this;

        function bindVideoAnchors() {
            var videoLinks = document.querySelectorAll('a[data-popup-type="video"]');

            videoLinks.forEach(function(link) {
                if (!link.classList.contains('video-popup-bound')) {
                    link.classList.add('video-popup-bound');

                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        var rawUrl = link.getAttribute('href') || '';
                        var title = (link.getAttribute('data-title') || link.textContent || 'Video').trim();
                        var description = link.getAttribute('data-description') || '';

                        var embedUrl = self.toYouTubeEmbedUrl(rawUrl);
                        if (embedUrl) {
                            self.openVideo(embedUrl, title, description);
                        } else {
                            // Fallback: open original URL
                            window.open(rawUrl, '_blank');
                        }
                    });
                }
            });
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', bindVideoAnchors);
        } else {
            bindVideoAnchors();
        }

        var observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === 'childList') {
                    bindVideoAnchors();
                }
            });
        });

        observer.observe(document.body, {
            childList: true,
            subtree: true
        });
    };

    // Convert a YouTube URL (short or long) to an embeddable URL with autoplay
    ImagePopup.prototype.toYouTubeEmbedUrl = function(url) {
        try {
            if (!url) return null;
            var videoId = null;
            var parsed = new URL(url, window.location.origin);

            // youtu.be/<id>
            if (parsed.hostname.indexOf('youtu.be') !== -1) {
                videoId = parsed.pathname.replace('/', '').split('/')[0];
            }

            // youtube.com/watch?v=<id>
            if (!videoId && parsed.searchParams && parsed.searchParams.get('v')) {
                videoId = parsed.searchParams.get('v');
            }

            // youtube.com/embed/<id>
            if (!videoId && parsed.pathname.indexOf('/embed/') !== -1) {
                videoId = parsed.pathname.split('/embed/')[1].split('/')[0];
            }

            if (!videoId) return null;
            return 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&rel=0&modestbranding=1';
        } catch (e) {
            return null;
        }
    };

    // Open video inside the same popup container using an iframe
    ImagePopup.prototype.openVideo = function(embedUrl, title, description) {
        var self = this;

        document.getElementById('image-popup-title').textContent = title;

        var iframe = document.createElement('iframe');
        iframe.src = embedUrl;
        iframe.className = 'video-popup-iframe';
        iframe.width = '100%';
        iframe.height = '420';
        iframe.setAttribute('frameborder', '0');
        iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share');
        iframe.setAttribute('allowfullscreen', '');

        var content = document.getElementById('image-popup-content');
        content.innerHTML = '';
        content.appendChild(iframe);

        if (description) {
            var descDiv = document.createElement('div');
            descDiv.className = 'image-popup-description';
            descDiv.textContent = description;
            content.appendChild(descDiv);
        }

        this.overlay.classList.add('show');
        this.container.classList.add('show');
        this.isOpen = true;

        document.body.style.overflow = 'hidden';

        setTimeout(function() {
            self.container.querySelector('.image-popup-close').focus();
        }, 100);
    };
    
    ImagePopup.prototype.open = function(imageSrc, title, description) {
        var self = this;
        
        // Update title
        document.getElementById('image-popup-title').textContent = title;
        
        // Create image
        var img = document.createElement('img');
        img.src = imageSrc;
        img.className = 'image-popup-image';
        img.alt = title;
        
        // Add loading state
        img.style.opacity = '0';
        img.style.transition = 'opacity 0.3s ease';
        
        img.onload = function() {
            img.style.opacity = '1';
        };
        
        img.onerror = function() {
            // If image fails to load, show error message
            img.style.display = 'none';
            var errorDiv = document.createElement('div');
            errorDiv.style.color = '#ff6b6b';
            errorDiv.style.padding = '20px';
            errorDiv.textContent = 'Erro ao carregar a imagem. Verifique se o arquivo existe.';
            self.container.querySelector('#image-popup-content').appendChild(errorDiv);
        };
        
        // Clear previous content and add new
        var content = document.getElementById('image-popup-content');
        content.innerHTML = '';
        content.appendChild(img);
        
        // Add description if provided
        if (description) {
            var descDiv = document.createElement('div');
            descDiv.className = 'image-popup-description';
            descDiv.textContent = description;
            content.appendChild(descDiv);
        }
        
        // Show popup
        this.overlay.classList.add('show');
        this.container.classList.add('show');
        this.isOpen = true;
        
        // Prevent body scroll
        document.body.style.overflow = 'hidden';
        
        // Focus management
        setTimeout(function() {
            self.container.querySelector('.image-popup-close').focus();
        }, 100);
    };
    
    ImagePopup.prototype.close = function() {
        // Hide popup
        this.overlay.classList.remove('show');
        this.container.classList.remove('show');
        this.isOpen = false;
        
        // Restore body scroll
        document.body.style.overflow = '';
        
        // Clear content
        var content = document.getElementById('image-popup-content');
        content.innerHTML = '';
        
        // Remove show classes after animation
        setTimeout(function() {
            this.overlay.style.display = 'none';
            this.container.style.display = 'none';
        }.bind(this), 300);
    };
    
    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            window.imagePopup = new ImagePopup();
        });
    } else {
        window.imagePopup = new ImagePopup();
    }
    
})();