@extends('index')

@section('title', 'Bogor Culinary - Charts')

@section('page-title', 'Charts')

@section('content')
    <div id="charts">
        <h2>Favorite Food Charts</h2>
        <canvas id="favoriteChart" width="400" height="200"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to add event listeners to favorite buttons
            function addFavoriteButtonListeners() {
                const favoriteButtons = document.querySelectorAll('.favorite-button');

                favoriteButtons.forEach(button => {
                    // Check if the card containing the button exists
                    const card = button.closest('.food-card');
                    if (card) {
                        button.addEventListener('click', function(event) {
                            event.preventDefault();
                            const itemId = card.getAttribute('data-id');
                            toggleFavorite(itemId);
                            button.classList.toggle('clicked');
                            updateChart();
                        });
                    } else {
                        console.error('Card not found for button:', button);
                    }
                });
            }
            // Function to toggle favorite items in localStorage
            function toggleFavorite(itemId) {
                let favorites = JSON.parse(localStorage.getItem('favorites')) || [];

                if (favorites.includes(itemId)) {
                    favorites = favorites.filter(id => id !== itemId);
                } else {
                    favorites.push(itemId);
                }

                localStorage.setItem('favorites', JSON.stringify(favorites));
            }

            // Function to load favorites from localStorage and update UI
            function loadFavorites() {
                const favorites = JSON.parse(localStorage.getItem('favorites')) || [];
                favorites.forEach(itemId => {
                    const button = document.querySelector(
                        `.food-card[data-id="${itemId}"] .favorite-button`);
                    if (button) {
                        button.classList.add('clicked');
                    }
                });
                updateChart();
            }

            // Function to update the chart with favorite items data
            function updateChart() {
                const favorites = JSON.parse(localStorage.getItem('favorites')) || [];

                if (favorites.length === 0) {
                    document.getElementById('charts').innerHTML = '<p>Belum ada item favorit.</p>';
                    return;
                }

                const categoryCounts = {};

                favorites.forEach(itemId => {
                    const card = document.querySelector(`.food-card[data-id="${itemId}"]`);
                    if (card) {
                        const categoryElement = card.querySelector('.category');
                        if (categoryElement) {
                            const category = categoryElement.textContent;
                            categoryCounts[category] = (categoryCounts[category] || 0) + 1;
                        }
                    }
                });

                const categories = Object.keys(categoryCounts);
                const counts = categories.map(category => categoryCounts[category]);

                const ctx = document.getElementById('favoriteChart').getContext('2d');
                if (!ctx) {
                    console.error('Canvas element not found');
                    return;
                }

                if (window.favoriteChart && typeof window.favoriteChart.destroy === 'function') {
                    window.favoriteChart.destroy();
                }

                window.favoriteChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: categories,
                        datasets: [{
                            label: 'Favorite Food Categories',
                            data: counts,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
            // Initial load of favorite items and event listeners
            loadFavorites();
            addFavoriteButtonListeners();
        });
        
    </script>
@endsection
