@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column align-items-center" style="padding: 40px 0;">
    <!-- Title -->
    <div style="color: black; font-size: 32px; font-family: Inter; font-weight: 700; margin: 24px 0;">
        Frequently Asked Questions
    </div>

    <!-- FAQ Accordion -->
    <div style="width: 640px; display: flex; flex-direction: column; gap: 16px;" id="faq-container">

        <!-- Loop dari Database -->
        @forelse ($faqs as $faq)
        <div class="faq-item" style="padding: 16px; background: #F5F5F5; border-radius: 8px; border: 1px solid #D9D9D9; cursor: pointer;">
            <div class="faq-question d-flex justify-content-between align-items-center">
                <div style="color: #1E1E1E; font-size: 16px; font-family: Inter; font-weight: 600;">
                    {{ $faq->pertanyaan }}
                </div>
                <div class="faq-icon" style="width: 20px; height: 20px; position: relative;">
                    <div class="arrow" style="width: 10px; height: 5px; position: absolute; top: 7.5px; left: 5px; border: 2px solid #1E1E1E; transform: rotate(0deg); transition: transform 0.3s;"></div>
                </div>
            </div>
            <div class="faq-answer" style="margin-top: 12px; color: #555; font-size: 14px; display: none;">
                {{ $faq->jawaban }}
            </div>
        </div>
        @empty
            <div style="text-align: center; color: #888;">Belum ada data FAQ.</div>
        @endforelse

    </div>
</div>

<!-- Accordion Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const items = document.querySelectorAll('.faq-item');

        items.forEach(item => {
            item.addEventListener('click', () => {
                const answer = item.querySelector('.faq-answer');
                const arrow = item.querySelector('.arrow');

                // Toggle visibility
                const isVisible = answer.style.display === 'block';
                answer.style.display = isVisible ? 'none' : 'block';

                // Rotate arrow
                arrow.style.transform = isVisible ? 'rotate(0deg)' : 'rotate(180deg)';
            });
        });
    });
</script>
@endsection
