{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Carousel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div id="cardCarousel" class="carousel slide">
            <div class="carousel-inner">
                @forelse ($produits as $index => $card)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ $card->image_url }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $card->libelle }}</h5>
                                <p class="card-text">{{ $card->text }}</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No cards available.</p>
                @endforelse
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#cardCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#cardCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> --}}

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Carousel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .carousel-item {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
        }
        .carousel-item .card {
            flex: 0 0 auto;
            width: 18rem;
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div id="cardCarousel" class="carousel slide">
            <div class="carousel-inner">
                @forelse ($produits->chunk(4) as $chunk)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="d-flex">
                            @foreach ($chunk as $card)
                                <div class="card" style="width: 18rem;">
                                    <img src="{{ $card->image_url }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $card->libelle }}</h5>
                                        <p class="card-text">{{ $card->text }}</p>
                                        <a href="#" class="btn btn-primary">Go somewhere{{$loop->first}}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <p>No cards available.</p>
                @endforelse
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#cardCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#cardCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Carousel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .carousel-inner {
            display: flex;
            flex-wrap: nowrap;
            overflow: hidden;
        }
        .carousel-item {
            display: flex;
            flex: 0 0 auto;
            width: 100%; /* Full width of the carousel */
        }
        .carousel-item .d-flex {
            display: flex;
            flex-wrap: nowrap;
        }
        .carousel-item .card {
            flex: 0 0 18rem; /* Fixed width of cards */
            margin-right: 15px; /* Spacing between cards */
        }
        .carousel-control-prev, .carousel-control-next {
            z-index: 5;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div id="cardCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @forelse ($produits->chunk(4) as $chunk)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="d-flex">
                            @foreach ($chunk as $card)
                                <div class="card" style="width: 18rem;">
                                    <img src="{{ $card->image_url }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $card->title }}</h5>
                                        <p class="card-text">{{ $card->text }}</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <p>No cards available.</p>
                @endforelse
            </div>
            <button class="carousel-control-prev" type="button" id="prevButton">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" id="nextButton">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const carousel = document.querySelector('#cardCarousel');
            const carouselInner = carousel.querySelector('.carousel-inner');
            const items = Array.from(carouselInner.querySelectorAll('.carousel-item'));
            const numItems = items.length;
            const itemsPerSlide = 1; // Number of items per slide in the carousel view
            const itemsVisible = 4; // Number of items visible at once

            // Function to calculate and set the correct width for carousel items
            function setCarouselWidth() {
                const itemWidth = items[0].offsetWidth;
                const totalWidth = itemWidth * numItems;
                carouselInner.style.width = `${totalWidth}px`;
            }

            // Set the initial width of carousel
            setCarouselWidth();

            let currentIndex = 0;

            function updateCarousel() {
                const offset = -currentIndex * (items[0].offsetWidth / itemsPerSlide);
                carouselInner.style.transform = `translateX(${offset}px)`;
                carouselInner.style.transition = 'transform 0.5s ease-in-out';
            }

            document.querySelector('#nextButton').addEventListener('click', function () {
                if (currentIndex < numItems - itemsVisible) {
                    currentIndex++;
                    updateCarousel();
                }
            });

            document.querySelector('#prevButton').addEventListener('click', function () {
                if (currentIndex > 0) {
                    currentIndex--;
                    updateCarousel();
                }
            });

            window.addEventListener('resize', () => {
                setCarouselWidth();
                updateCarousel();
            });

            // Initialize carousel position
            updateCarousel();
        });
    </script>
</body>
</html>
