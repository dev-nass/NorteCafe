const scripts = [
    "../resources/js/scrollReveal.min.js",
    "js/registration.js",
    "../resources/js/menu/quantityUpdate.js",
    "js/menu/selectOnlyOneAddOn.js",
    "js/admin_dashboard_foot_p1.js",
    "js/admin_dashboard_foot_p2.js"
];

async function loadScripts() {
    for (const script of scripts) {
        try {
            import(`../${script}`); // Dynamically import each script
            console.log(`Loaded: ${script}`);
        } catch (error) {
            console.error(`Failed to load: ${script}`, error);
        }
    }
}

loadScripts();
