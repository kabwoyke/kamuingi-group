<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation">
            <span>
                @if ($paginator->onFirstPage())
                    <span>Previous</span>
                @else
                    <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev">Previous</button>
                @endif
            </span>

            <span>
                @if ($paginator->onLastPage())
                    <span>Next</span>
                @else
                    <button wire:click="nextPage" wire:loading.attr="disabled" rel="next">Next</button>
                @endif
            </span>
        </nav>


        <style>
            nav[aria-label="Pagination Navigation"] {
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 20px 0;
                font-family: Arial, sans-serif;
            }

            nav[aria-label="Pagination Navigation"] span {
                font-size: 1.6rem;
                margin: 0 .8rem;
            }

            nav[aria-label="Pagination Navigation"] button {
                background-color: #2d6a4f;
                color: white;
                border: none;
                padding: 10px 15px;
                font-size: 16px;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            nav[aria-label="Pagination Navigation"] button:hover {
                background-color: #0056b3;
            }

            nav[aria-label="Pagination Navigation"] button:disabled {
                background-color: #ddd;
                color: #999;
                cursor: not-allowed;
            }

            nav[aria-label="Pagination Navigation"] span > span {
                padding: 10px 15px;
                background-color: #f1f1f1;
                color: #777;
                border: 1px solid #ddd;
                border-radius: 5px;
            }

            </style>

    @endif
