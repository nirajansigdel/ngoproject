<!-- Header -->
<style>
    .toplogo {
        width: auto;
        height: 70px;
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .toplogo img {
        width: auto;
        height: 100%;
        object-fit: cover;
    }
    .nav-item .dropdown-menu {
        top: 100%;
        left: 0;
        transform: none;
        background: ;
    }

    .header.sticky {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1000;
    }


    .nav-small .image img {
        height: 40px;
    }

    .nav-small .slogon,
    .nav-small .c-name {
        display: none;
    }

    .header {
        position: sticky;
        top: 0;
        background-color: #eeedf3;
        z-index: 1000;
    }


    .bg-red-500 {
        --tw-bg-opacity: 1;
        background-color: rgb(239 68 68 / var(--tw-bg-opacity));
    }
    .navbar-nav .nav-link {
        color: var(--black-off) !important;
        font-size: 18px;
        text-transform: capitalize;
        margin: 0 0.7rem;
        background: none;
        font-family: var(--font-family);
    }


    .navbar-nav .nav-link:hover {
        color: var(--primary) !important;
        border-radius: 5px;
        font-weight: 500;
    }


    .navbar-nav .nav-link.active {
        color: var(--white) !important;
        border-radius: 5px;
        font-weight: 500;
        background: var(--primary);
        padding: 8px;
    }

    .contactlink {
        background-color: var(--bs-yellow) !important;
        border-radius: 5px;
    }


    @media (max-width: 1366px) {
        .navbar-expand-lg .navbar-collapse {
            display: none !important;
        }

        .navbar-expand-lg .navbar-toggler {
            display: block !important;
        }

        .navbar-expand-lg .navbar-collapse.collapsing {
            display: block !important;
        }

        .navbar-expand-lg .navbar-collapse.show {
            display: block !important;
        }
    }

    @media (max-width: 1366px) {
        .navbar-expand-lg .navbar-collapse {
            display: none !important;
        }

        .navbar-expand-lg .navbar-toggler {
            display: block !important;
        }

        .navbar-expand-lg .navbar-collapse.collapsing {
            display: block !important;
        }

        .navbar-expand-lg .navbar-collapse.show {
            display: block !important;
        }
    }

    .navbar-collapse{
        
    }

    .badge.bg-danger {
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: 600;
        padding: 0;
        border: 2px solid white;
    }
</style>



<nav class="navbar navbar-expand-md bg-white py-2">
    <div class="container">
        <a class="navbar-brand toplogo" href="{{ route('index') }}">
            <img src="{{ asset('image/OIP.jpeg') }}" alt="Description">



        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link text-dark fw-medium " href="{{ route('index') }}"  id="navbarDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Introduction
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('index') }}">umberall organization</a></li>
                        <li><a class="dropdown-item" href="{{ route('About') }}">About Us</a></li>
                        <li><a class="dropdown-item" href="{{ route('whyus') }}">Why Us</a></li>
                        <li><a class="dropdown-item" href="{{ route("Contact") }}">Contact us</a></li>
                        <li><a class="dropdown-item" href="{{ route('Gallery') }}">Gallery</a></li>
                        <li class="nav-item">

                        </li>
                    </ul>
                </li>
     <li class="nav-item dropdown">
    <a class="nav-link text-dark fw-medium" href="" id="navbarDropdown" role="button"
        data-bs-toggle="dropdown" aria-expanded="false">
        Projects
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        @php
            // Get unique demand types from both 'type' and 'demand_types' columns
            $demands = App\Models\Demand::select('type', 'demand_types')
                ->whereNotNull('type')
                ->orWhereNotNull('demand_types')
                ->get();
            
            $allDemandTypes = collect();
            
            foreach($demands as $demand) {
                // Add from 'type' column
                if ($demand->type) {
                    $allDemandTypes->push($demand->type);
                }
                
                // Add from 'demand_types' JSON column
                if ($demand->demand_types && is_array($demand->demand_types)) {
                    foreach($demand->demand_types as $demandType) {
                        $allDemandTypes->push($demandType);
                    }
                }
            }
            
            $createdDemandTypes = $allDemandTypes->unique()->sort();
                             
            // Define the mapping of values to display names
            $demandTypeNames = [
                'cyc' => 'Chautari Youth Project',
                'nsep' => 'Next Steps Education Program (NSEP)',
                'frp' => 'Family Reintegration',
                'community_empowerment' => 'Community Empowerment',
                'bamboo_project' => 'Bamboo Project',
                'child_care_home' => 'Child Care Home'
            ];
        @endphp
                 
        @if($createdDemandTypes->count() > 0)
            @foreach($createdDemandTypes as $demandType)
                @if(isset($demandTypeNames[$demandType]))
                    <li>
                        <a class="dropdown-item" href="{{ route('projects.show', $demandType) }}">
                            {{ $demandTypeNames[$demandType] }}
                        </a>
                    </li>
                @endif
            @endforeach
        @else
            <li><span class="dropdown-item text-muted">No projects available</span></li>
        @endif
    </ul>
</li>

                <li class="nav-item">
                    <a class="nav-link text-dark fw-medium" href="{{ route('Service') }}">Our Service</a>
                </li>
                  <li class="nav-item">
                    <a class="nav-link text-dark fw-medium" href="{{ route('career') }}"> opportunity</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-dark fw-medium " href="" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Updates
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('events') }}">News & events</a></li>
                        <a class="dropdown-item" href="{{ route('Blogpostcategory') }}">Blogs</a>
                       <a class="dropdown-item" href="{{ route('faqs') }}">Procurement</a>


                    </ul>
                </li>


            </ul>
            <div class="d-flex align-items-center gap-3">
                <div class="position-relative border px-3 py-2 rounded-pill d-flex align-items-center">
                    <span>📞 +91 5714749074</span>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-green">
                        1
                    </span>
                </div>

            </div>
        </div>
    </div>
</nav>






<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<style>
    /* Show dropdown on hover */
    .nav-item.dropdown:hover .dropdown-menu {
        display: block;
        margin-top: 0;
        /* Remove any offset */
    }

    /* Optional: Keep dropdown open while hovering over it */
    .nav-item.dropdown:hover>.nav-link {
        color: #000;
    }
</style>


<!-- section 2 -->