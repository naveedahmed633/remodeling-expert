document.addEventListener("DOMContentLoaded", function () {
    // Set checkbox values based on labels
    function setCheckboxValuesByStep(stepClass) {
        const steps = document.querySelectorAll(stepClass);
        steps.forEach(function (section) {
            const checkboxes = section.querySelectorAll(".form-check-input");
            checkboxes.forEach(function (checkbox) {
                const label = section.querySelector(`label[for="${checkbox.id}"]`);
                if (label) {
                    checkbox.value = label.textContent.trim();
                }
            });
        });
    }

    // Apply to all step sections
    setCheckboxValuesByStep(".stepOne");
    setCheckboxValuesByStep(".stepTwo");
    setCheckboxValuesByStep(".stepThree");
    setCheckboxValuesByStep(".stepFour");

    // Handle checkboxes and update input fields
    function handleCheckboxSection(sectionClass, inputSelector) {
        const sections = document.querySelectorAll(sectionClass);

        sections.forEach((section) => {
            const checkboxes = section.querySelectorAll(".form-check-input");
            const input = document.querySelector(inputSelector);

            checkboxes.forEach((checkbox) => {
                const label = section.querySelector(`label[for="${checkbox.id}"]`);
                if (label) {
                    checkbox.value = label.textContent.trim();
                }

                checkbox.addEventListener("change", () => {
                    const selected = [];
                    checkboxes.forEach((box) => {
                        if (box.checked) {
                            const lbl = section.querySelector(`label[for="${box.id}"]`);
                            if (lbl) {
                                selected.push(lbl.textContent.replace(/\s+/g, " ").trim());
                            }
                        }
                    });

                    if (input) {
                        input.value = selected.join(", ");
                    }
                });
            });
        });
    }

    // Use the function for each checkbox section
    handleCheckboxSection(".service-section", ".select-services");
    handleCheckboxSection(".subCategory", ".sub-category-input");
    handleCheckboxSection(".remodelType", ".remodel-type-input");
    handleCheckboxSection(".requirement", ".requirements-input");

    // Multi-step form logic
    const btn = document.getElementById("continueBtn");
    let currentTab = 1;
    const totalTabs = 5;
    const progressSteps = document.querySelectorAll(".progress-step");

    btn.addEventListener("click", function (e) {
        e.preventDefault();

        if (currentTab < totalTabs) {
            // Switch to next tab
            const currentTabId = `#tab${currentTab}`;
            const nextTabId = `#tab${currentTab + 1}`;

            document.querySelector(currentTabId).classList.remove("show", "active");
            document.querySelector(nextTabId).classList.add("show", "active");

            // Update button's target
            btn.setAttribute("data-bs-target", nextTabId);

            currentTab++;

            // Update progress bar
            updateProgress();

            // If last tab, change button to "Submit"
            if (currentTab === totalTabs) {
                btn.textContent = "Submit";
                btn.removeAttribute("data-bs-toggle");
                btn.setAttribute("type", "submit");
            }
        } else {
            if (validateForm()) {
                document.getElementById("multiStepForm").submit();
            } else {
                alert("Please fill all the required fields");
            }
        }
    });

    // Update progress steps UI
    function updateProgress() {
        progressSteps.forEach((step) => {
            const stepNum = parseInt(step.getAttribute("data-step"));
            step.style.backgroundColor = stepNum === currentTab ? "#0d6efd" : "#ccc";
        });
    }

    // Initial progress step setup
    updateProgress();

    // Form validation function
    function validateForm() {
        let inputs = document.querySelectorAll("#multiStepForm input[required]");
        for (let input of inputs) {
            if (input.value.trim() === "") {
                return false;
            }
        }
        return true;
    }
});

