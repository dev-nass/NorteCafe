<?php require base_path('resources/views/components/admin_head.php') ?>
<?php require base_path('resources/views/components/admin_sidebar.php') ?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php require base_path('resources/views/components/admin_navbar.php') ?>
    <div class="container-fluid py-2 overflow-hidden">

        <div class="row">
            <div class="col-6 col-lg-3 mb-3 mb-lg-0">
                <div class="bg-white rounded shadow p-3 d-flex justify-content-between">
                    <div>
                        <span class="opacity-20">Revenue</span>
                        <h4 class="mb-0">₱<?= number_format($total_revenue, '2', '.', ',') ?></h4>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#753ee9">
                            <path d="M120-120v-76l60-60v136h-60Zm165 0v-236l60-60v296h-60Zm165 0v-296l60 61v235h-60Zm165 0v-235l60-60v295h-60Zm165 0v-396l60-60v456h-60ZM120-356v-85l280-278 160 160 280-281v85L560-474 400-634 120-356Z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 mb-3 mb-lg-0">
                <div class="bg-white rounded shadow p-3 d-flex justify-content-between">
                    <div>
                        <span class="opacity-20">Transactions</span>
                        <h4 class="mb-0"><?= $total_transactions ?></h4>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#753ee9">
                            <path d="M540-420q-50 0-85-35t-35-85q0-50 35-85t85-35q50 0 85 35t35 85q0 50-35 85t-85 35ZM220-280q-24.75 0-42.37-17.63Q160-315.25 160-340v-400q0-24.75 17.63-42.38Q195.25-800 220-800h640q24.75 0 42.38 17.62Q920-764.75 920-740v400q0 24.75-17.62 42.37Q884.75-280 860-280H220Zm100-60h440q0-42 29-71t71-29v-200q-42 0-71-29t-29-71H320q0 42-29 71t-71 29v200q42 0 71 29t29 71Zm480 180H100q-24.75 0-42.37-17.63Q40-195.25 40-220v-460h60v460h700v60ZM220-340v-400 400Z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 mb-3 mb-lg-0">
                <div class="bg-white rounded shadow p-3 d-flex justify-content-between">
                    <div>
                        <span class="opacity-20">Visits</span>
                        <h4 id="visit-header" class="mb-0">...</h4>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#753ee9">
                            <path d="M121-473v-60h126v60H121Zm114 231-40-40 88-88 40 40-88 88Zm48-397-88-88 40-40 88 88-40 40Zm457 480L552-347l-44 136-104-360 352 111-138 49 187 187-65 65ZM437-714v-126h60v126h-60Zm214 75-40-40 88-88 40 40-88 88Z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 mb-3 mb-lg-0">
                <div class="bg-white rounded shadow p-3 d-flex justify-content-between">
                    <div>
                        <span class="opacity-20">Customers</span>
                        <h4 class="mb-0"><?= $total_customers ?></h4>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#753ee9">
                            <path d="M38-160v-94q0-35 18-63.5t50-42.5q73-32 131.5-46T358-420q62 0 120 14t131 46q32 14 50.5 42.5T678-254v94H38Zm700 0v-94q0-63-32-103.5T622-423q69 8 130 23.5t99 35.5q33 19 52 47t19 63v94H738ZM358-481q-66 0-108-42t-42-108q0-66 42-108t108-42q66 0 108 42t42 108q0 66-42 108t-108 42Zm360-150q0 66-42 108t-108 42q-11 0-24.5-1.5T519-488q24-25 36.5-61.5T568-631q0-45-12.5-79.5T519-774q11-3 24.5-5t24.5-2q66 0 108 42t42 108ZM98-220h520v-34q0-16-9.5-31T585-306q-72-32-121-43t-106-11q-57 0-106.5 11T130-306q-14 6-23 21t-9 31v34Zm260-321q39 0 64.5-25.5T448-631q0-39-25.5-64.5T358-721q-39 0-64.5 25.5T268-631q0 39 25.5 64.5T358-541Zm0 321Zm0-411Z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-8 mt-4">
                <div class="bg-white rounded p-3 w-100 shadow">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0">Revenue: </h4>
                            <p class="opacity-10 text-xs mb-1">Real Time Update</p>
                            <h3 class="revenue-amount-header"></h3>
                        </div>
                        <div>
                            <div class="dropdown">
                                <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="material-symbols-rounded opacity-10">more_horiz</i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li onclick="updateChart('today')"><button class="btn mb-0">Today</button></li>
                                    <li onclick="updateChart('weekly')"><button class="btn mb-0">Weekly</button></li>
                                    <li onclick="updateChart('monthly')"><button class="btn mb-0">Monthly</button></li>
                                    <li onclick="updateChart('annual')"><button class="btn mb-0">Annualy</button></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <canvas id="revenue-graph"></canvas>
                </div>
            </div>

            <div class="col-12 col-lg-4 mt-4">
                <div class="bg-white rounded shadow p-3 h-100 d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="mb-0">Transactions</h5>
                        <p class="text-sm opacity-10">All Time</p>
                    </div>

                    <canvas id="transaction-graph" height="275"></canvas>

                    <div class="d-flex justify-content-around mt-3">
                        <div>
                            <p class="mb-0 text-center text-bold"><?= $total_delivered ?></p>
                            <p class="text-sm mb-0">Delivered</p>
                        </div>
                        <div>
                            <p class="mb-0 text-center text-bold"><?= $total_rejected ?></p>
                            <p class="text-sm mb-0">Rejected</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php require base_path('resources/views/components/admin_foot.php') ?>