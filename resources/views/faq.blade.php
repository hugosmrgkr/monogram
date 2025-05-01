@extends('layouts.app')

@section('title', 'FAQ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/faq.css') }}">
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="hero-text">
            <h1 class="display-3 fw-bold">&gt;monogram_ FAQ</h1>
            <p class="lead">
                Temukan jawaban atas pertanyaan-pertanyaan umum seputar layanan Monogram Studio Balige.<br>
                Jika masih ada yang belum jelas, jangan ragu untuk menghubungi kami.
            </p>
        </div>
    </section>

    <!-- FAQ List -->
    <section class="faq-section py-6">
        <div class="container">
            <div class="text-center mx-auto">
                <h2 class="mb-4 text-center fw-bold faq-heading position-relative">
                    Frequently Asked Questions
                    <span class="faq-underline"></span>
                </h2>
            </div>

            <div class="accordion accordion-flush mx-auto" id="faqAccordion">
                @forelse ($faqs as $index => $faq)
                    <div class="accordion-item">
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
                    <div class="text-center text-muted">Belum ada data FAQ.</div>
                @endforelse
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
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
        });
    </script>
@endsection
