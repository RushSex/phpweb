document.addEventListener('DOMContentLoaded', () => {
    const reviewsList = document.querySelector('.reviews__list');
    const allReviews = Array.from(document.querySelectorAll('.reviews__item'));
    const visibleCount = 8; 
    let currentVisible = visibleCount;

    function showNextReviews() {
        const hiddenReviews = allReviews.filter(review => !review.classList.contains('visible'));

        if (hiddenReviews.length === 0) return; 

        const nextBatch = hiddenReviews.slice(0, 4);
        nextBatch.forEach(review => {
        review.classList.remove('hidden');
        review.classList.add('visible');
        });

        currentVisible += 4; 
    }

    function checkVisibility() {
        const visibleReviews = document.querySelectorAll('.visible');
        const lastVisibleReview = visibleReviews[visibleReviews.length - 1];

        if (lastVisibleReview) {
        const rect = lastVisibleReview.getBoundingClientRect();
        const isNearBottom = rect.bottom <= window.innerHeight + 100;

        if (isNearBottom) {
            showNextReviews(); 
        }
        }
    }

    window.addEventListener('scroll', checkVisibility);

    checkVisibility();
});