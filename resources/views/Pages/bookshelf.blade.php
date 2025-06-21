@extends('layouts.app')

{{-- Page Name --}}
@section('page_name')
    Bookshelf
@endsection

{{-- Styles --}}
@section('styles')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f5f5f5;
            color: #333;
        }

        header {
            background-color: #2c3e50;
            color: white;
            padding: 1rem;
            text-align: center;
        }

        header h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .search-container {
            max-width: 600px;
            margin: 2rem auto;
            display: flex;
            gap: 1rem;
        }

        .search-container input {
            flex: 1;
            padding: 0.75rem;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .search-container button {
            padding: 0.75rem 1.5rem;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-container button:hover {
            background-color: #2980b9;
        }

        .category-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .category-section h2 {
            font-size: 1.8rem;
            color: #2c3e50;
            margin-bottom: 1.5rem;
        }

        .bookshelf {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .book-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s;
        }

        .book-card:hover {
            transform: translateY(-5px);
        }

        .book-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .book-info {
            padding: 1rem;
        }

        .book-info h3 {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            color: #2c3e50;
        }

        .book-info p {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 0.5rem;
        }

        .book-info .author {
            font-style: italic;
        }

        .book-info .category {
            font-size: 0.8rem;
            color: #3498db;
        }

        .book-card a {
            text-decoration: none;
            color: inherit;
            display: block;
        }

        @media (max-width: 600px) {
            .bookshelf {
                grid-template-columns: 1fr;
            }

            .search-container {
                flex-direction: column;
            }

            .search-container input,
            .search-container button {
                width: 100%;
            }
        }
    </style>
@endsection

{{-- Content --}}
@section('content')
    {{-- bookshelf --}}
    <section class="content bookshelf-section py-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {{-- bookshelf header --}}
                    <div class="bookshelf-header text-center py-4">
                        <h1 class="heading-section">GuidanceHub Bookshelf</h1>
                        <p>Discover books recommended by our mentors to inspire growth and learning.</p>
                    </div>
                    {{-- ./bookshelf-header --}}
                </div>
            </div>

            <div class="bookshelf">
                <div class="row">
                    <div class="search-container">
                        <input type="text" id="searchInput" placeholder="Search books by title or author...">
                        <button onclick="searchBooks()">Search</button>
                    </div>

                    <div class="category-section" id="categorySection">
                        <!-- Categories and books will be populated by JavaScript -->
                    </div>
                </div>
            </div>


        </div>
    </section>
    {{-- ./bookshelf --}}
@endsection

@section('scripts')
    <script>
        const categories = [{
                name: "Leadership",
                books: [{
                        title: "The 21 Irrefutable Laws of Leadership",
                        author: "John C. Maxwell",
                        description: "Timeless principles for effective leadership.",
                        image: "https://m.media-amazon.com/images/I/715+WtfNbFL._SL1500_.jpg",
                        category: "Leadership"
                    },
                    {
                        title: "Leaders Eat Last",
                        author: "Simon Sinek",
                        description: "Why some teams pull together and others don't.",
                        image: "https://simonsinek.com/wp-content/uploads/2022/02/LeadersEatLast-680x1024.jpeg",
                        category: "Leadership"
                    },
                    {
                        title: "Extreme Ownership",
                        author: "Jocko Willink and Leif Babin",
                        description: "How U.S. Navy SEALs lead and win.",
                        image: "https://m.media-amazon.com/images/I/71nozgTmmwL._SL1500_.jpg",
                        category: "Leadership"
                    }
                ]
            },
            {
                name: "Business Strategy",
                books: [{
                        title: "Good Strategy Bad Strategy",
                        author: "Richard Rumelt",
                        description: "The difference and why it matters.",
                        image: "https://m.media-amazon.com/images/I/71TWIcex2bL._SL1500_.jpg",
                        category: "Business Strategy"
                    },
                    {
                        title: "Blue Ocean Strategy",
                        author: "W. Chan Kim and Renée Mauborgne",
                        description: "Creating uncontested market space.",
                        image: "https://m.media-amazon.com/images/I/91YCWH4jFdL._SL1500_.jpg",
                        category: "Business Strategy"
                    },
                    {
                        title: "The Lean Startup",
                        author: "Eric Ries",
                        description: "How today's entrepreneurs use continuous innovation.",
                        image: "https://books.google.com.eg/books/content?id=19forYX7NLQC&pg=PA1&img=1&zoom=3&hl=en&bul=1&sig=ACfU3U2_Sy918bBL-t5pp238gGNhEOAPhg&w=1280",
                        category: "Business Strategy"
                    }
                ]
            },
            {
                name: "Personal Development",
                books: [{
                        title: "Atomic Habits",
                        author: "James Clear",
                        description: "An easy & proven way to build good habits.",
                        image: "https://books.google.com.eg/books/publisher/content?id=fo5REQAAQBAJ&pg=PA1&img=1&zoom=3&hl=en&bul=1&sig=ACfU3U1JPo9J8o2UqMIQ1Se8bfLWB2EPZA&w=1280",
                        category: "Personal Development"
                    },
                    {
                        title: "Mindset: The New Psychology of Success",
                        author: "Carol S. Dweck",
                        description: "How we can learn to fulfill our potential.",
                        image: "https://books.google.com.eg/books/content?id=fdjqz0TPL2wC&pg=PP1&img=1&zoom=3&hl=en&bul=1&sig=ACfU3U06sfVq6tGw_WsORq3cKn11Tl7QZQ&w=1280",
                        category: "Personal Development"
                    },
                    {
                        title: "The Power of Now",
                        author: "Eckhart Tolle",
                        description: "A guide to spiritual enlightenment.",
                        image: "https://books.google.com.eg/books/publisher/content?id=QFQ7DwAAQBAJ&pg=PP1&img=1&zoom=3&hl=en&bul=1&sig=ACfU3U0tFCzmbhdoYKtR5B4nzD1aMcpMIA&w=1280",
                        category: "Personal Development"
                    }
                ]
            },
            {
                name: "Communication",
                books: [{
                        title: "Never Split the Difference",
                        author: "Chris Voss",
                        description: "Negotiating as if your life depended on it.",
                        image: "https://books.google.com.eg/books/publisher/content?id=TL8CCwAAQBAJ&pg=PP1&img=1&zoom=3&hl=en&bul=1&sig=ACfU3U2E2GDvs0oazIppXbE9Knhn1N6__w&w=1280",
                        category: "Communication"
                    },
                    {
                        title: "Crucial Conversations",
                        author: "Kerry Patterson et al.",
                        description: "Tools for talking when stakes are high.",
                        image: "https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcRBdiZwScN8ng_CTfrahHuQSij99C3VWr_4C3swe7pL59EEMdtQ",
                        category: "Communication"
                    },
                    {
                        title: "Talk Like TED",
                        author: "Carmine Gallo",
                        description: "The 9 public-speaking secrets of the world's top minds.",
                        image: "https://books.google.com.eg/books/publisher/content?id=upebAgAAQBAJ&pg=PA1&img=1&zoom=3&hl=en&bul=1&sig=ACfU3U1X0ETTLdyvgdSyf5W37cM3mitSag&w=1280",
                        category: "Communication"
                    }
                ]
            }
        ];

        function displayBooks() {
            const categorySection = document.getElementById('categorySection');
            categorySection.innerHTML = '';

            categories.forEach(category => {
                if (category.books.length > 0) {
                    const categoryDiv = document.createElement('div');
                    categoryDiv.innerHTML = `<h2>${category.name}</h2>`;
                    const bookshelf = document.createElement('div');
                    bookshelf.classList.add('bookshelf');

                    category.books.forEach(book => {
                        const bookCard = document.createElement('div');
                        bookCard.classList.add('book-card');
                        const link = document.createElement('a');
                        link.href = book.image; // Using image as placeholder link
                        link.target = '_blank';
                        link.innerHTML = `
                                    <img src="${book.image}" alt="${book.title}">
                                    <div class="book-info">
                                        <h3>${book.title}</h3>
                                        <p class="author">by ${book.author}</p>
                                        <p>${book.description}</p>
                                        <p class="category">${book.category}</p>
                                    </div>
                                `;
                        bookCard.appendChild(link);
                        bookshelf.appendChild(bookCard);
                    });

                    categoryDiv.appendChild(bookshelf);
                    categorySection.appendChild(categoryDiv);
                }
            });
        }

        function searchBooks() {
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const originalCategories = JSON.parse(JSON.stringify(categories)); // Deep copy to preserve original

            categories.forEach(category => {
                category.books = category.books.filter(book =>
                    book.title.toLowerCase().includes(searchInput) ||
                    book.author.toLowerCase().includes(searchInput)
                );
            });

            displayBooks();

            // Restore original books after search
            Object.assign(categories, originalCategories);
        }

        // Initial display of all books
        displayBooks();

        // Search on Enter key
        document.getElementById('searchInput').addEventListener('keyup', function(event) {
            if (event.key === 'Enter') {
                searchBooks();
            }
        });
    </script>
@endsection
