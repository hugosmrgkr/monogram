@extends('layouts.app')

@section('title', 'FAQ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/faq.css') }}">
    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section" data-aos="fade" data-aos-duration="1000">
        <div class="hero-overlay"></div>
        <div class="hero-text">
            <h1 class="display-3 fw-bold" data-aos="fade-up" data-aos-delay="300">&gt;monogram_ FAQ</h1>
            <p class="lead" data-aos="fade-up" data-aos-delay="500">
                Temukan jawaban atas pertanyaan-pertanyaan umum seputar layanan Monogram Studio Balige.<br>
                Jika masih ada yang belum jelas, jangan ragu untuk menghubungi kami.
            </p>
        </div>
    </section>

    <!-- FAQ List -->
    <section class="faq-section py-6" data-aos="fade-up" data-aos-duration="800">
        <div class="container">
            <div class="text-center mx-auto" data-aos="fade-up" data-aos-duration="800">
                <h2 class="mb-4 text-center fw-bold faq-heading position-relative">
                    Frequently Asked Questions
                    <span class="faq-underline" data-aos="width" data-aos-delay="300"></span>
                </h2>
            </div>

            <div class="accordion accordion-flush mx-auto" id="faqAccordion">
                @forelse ($faqs as $index => $faq)
                    <div class="accordion-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="{{ 150 + ($index * 100) }}">
                        <h2 class="accordion-header" id="flush-heading{{ $index }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse{{ $index }}" aria-expanded="false"
                                aria-controls="flush-collapse{{ $index }}">
                                {{ $faq->pertanyaan }}
                            </button>
                        </h2>
                        <div id="flush-collapse{{ $index }}" class="accordion-collapse collapse"
                            aria-labelledby="flush-heading{{ $index }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {{ $faq->jawaban }}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-muted" data-aos="fade-in">Belum ada data FAQ.</div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- AOS JS Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize AOS with elegant settings
            AOS.init({
                duration: 800,        // Animation duration
                easing: 'ease-out',   // Easing function
                once: true,           // Whether animation should happen only once
                offset: 120,          // Offset (in px) from the original trigger point
                delay: 100,           // Default delay
                disable: 'mobile',    // Disable on mobile devices for performance
                anchorPlacement: 'top-bottom' // Define which position of the element regarding to window should trigger the animation
            });

            // Add special animation effect for the underline
            const underline = document.querySelector('.faq-underline');
            if (underline) {
                // This creates a custom animation effect when the element comes into view
                underline.addEventListener('aos:in', function() {
                    setTimeout(() => {
                        underline.style.width = '80px';
                        underline.style.opacity = '1';
                    }, 300);
                });
            }

            // Original FAQ toggle functionality
            const toggleButtons = document.querySelectorAll('.faq-toggle-btn');
            toggleButtons.forEach(button => {
                button.addEventListener('click', (event) => {
                    event.stopPropagation();
                    const faqItem = button.closest('.faq-item');
                    const answer = faqItem.querySelector('.faq-answer');
                    const arrow = button.querySelector('.arrow');
                    const isActive = answer.classList.contains('active');

                    answer.classList.toggle('active');
                    arrow.style.transform = isActive ? 'rotate(0deg)' : 'rotate(180deg)';
                });
            });

            // Add animation refresh when accordion is toggled
            const accordionButtons = document.querySelectorAll('.accordion-button');
            accordionButtons.forEach(button => {
                button.addEventListener('click', () => {
                    setTimeout(() => {
                        AOS.refresh();
                    }, 100);
                });
            });
        });
    </script>
@endsection