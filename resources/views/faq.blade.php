@extends('layouts.app')

@section('title', 'FAQ')

@section('content')
<div class="py-5">
    <h2 class="mb-4 text-center fw-bold" style="font-family: Inter, sans-serif; color: #1E1E1E;">
        Frequently Asked Questions
    </h2>

    <div class="mx-auto" style="max-width: 700px;" id="faq-container">
        @forelse ($faqs as $faq)
            <div class="faq-item mb-3 p-3 rounded border bg-light shadow-sm">
                <div class="faq-question d-flex justify-content-between align-items-center">
                    <div class="faq-text fw-semibold">
                        {{ $faq->pertanyaan }}
                    </div>
                    <button class="faq-toggle-btn btn p-0 ms-3" aria-label="Toggle Answer">
                        <div class="arrow"></div>
                    </button>
                </div>
                <div class="faq-answer">
                    {{ $faq->jawaban }}
                </div>
            </div>
        @empty
            <div class="text-center text-muted">Belum ada data FAQ.</div>
        @endforelse
    </div>
</div>

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
