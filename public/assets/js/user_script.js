
document.addEventListener('DOMContentLoaded', () => {
    const categoryToggle = document.querySelector('.category-toggle');
    const megaMenu = document.querySelector('.mega-menu');
    const categoryItems = document.querySelectorAll('.category-item');
    const categoryPanels = document.querySelectorAll('.category-panel');
    const body = document.querySelector('body');

    // Toggle main menu
    categoryToggle.addEventListener('click', (e) => {
        e.stopPropagation();
        megaMenu.classList.toggle('active');
    });

    // Handle category switching
    categoryItems.forEach(item => {
        item.addEventListener('mouseenter', () => {
            categoryItems.forEach(c => c.classList.remove('active'));
            categoryPanels.forEach(p => p.classList.remove('active'));
            
            const category = item.dataset.category;
            item.classList.add('active');
            document.querySelector(`.category-panel[data-category="${category}"]`).classList.add('active');
        });
    });

    // Close menu when clicking outside
    body.addEventListener('click', (e) => {
        if (!e.target.closest('.category-dropdown')) {
            megaMenu.classList.remove('active');
        }
    });

    // Keep menu open when interacting with it
    megaMenu.addEventListener('click', (e) => {
        e.stopPropagation();
    });
});

// subject grid start
// Scroll functionality
document.getElementById("scrollLeft").addEventListener("click", function() {
    document.getElementById("learningGrid").scrollBy({ left: -200, behavior: "smooth" });
});

document.getElementById("scrollRight").addEventListener("click", function() {
    document.getElementById("learningGrid").scrollBy({ left: 200, behavior: "smooth" });
});


// See More button functionality
document.getElementById("seeMore").addEventListener("click", function() {
    alert("Loading more courses...");
    // Add your logic to load more courses dynamically
});

// Card hover effects
const cards = document.querySelectorAll(".card");
cards.forEach(card => {
    card.addEventListener("mouseenter", () => {
        card.style.transform = "translateY(-10px)";
        card.style.boxShadow = "0 8px 16px rgba(0, 0, 0, 0.2)";
    });
    card.addEventListener("mouseleave", () => {
        card.style.transform = "translateY(0)";
        card.style.boxShadow = "0 4px 12px rgba(0, 0, 0, 0.1)";
    });
});
// subject grid enD

