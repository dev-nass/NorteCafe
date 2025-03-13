
document.addEventListener("DOMContentLoaded", () => {
    const addOnBtns = document.querySelectorAll("input[name='add_ons_id']");
    
    addOnBtns.forEach((radioBtn) => {
        radioBtn.addEventListener("click", () => {
            if (radioBtn.checked && radioBtn.dataset.wasChecked === "true") {
                radioBtn.checked = false;
                radioBtn.dataset.wasChecked = "false";
            } else {
                document.querySelectorAll("input[name='add_ons_id']").forEach(el => el.dataset.wasChecked = "false");
                radioBtn.dataset.wasChecked = "true";
            }
        });
    });
});