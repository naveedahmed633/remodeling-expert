// Order

const stepOne = document.querySelectorAll(".stepOne");

stepOne.forEach(function (section) {
    const checkboxes = section.querySelectorAll(".form-check-input");

    checkboxes.forEach(function (checkbox) {
        const label = section.querySelector(`label[for="${checkbox.id}"]`);
        if (label) {
            checkbox.value = label.textContent.trim();
        }
    });
});

const stepTwo = document.querySelectorAll(".stepTwo");

stepTwo.forEach(function (section) {
    const checkboxes = section.querySelectorAll(".form-check-input");

    checkboxes.forEach(function (checkbox) {
        const label = section.querySelector(`label[for="${checkbox.id}"]`);
        if (label) {
            checkbox.value = label.textContent.trim();
        }
    });
});

const stepThree = document.querySelectorAll(".stepThree");

stepThree.forEach(function (section) {
    const checkboxes = section.querySelectorAll(".form-check-input");

    checkboxes.forEach(function (checkbox) {
        const label = section.querySelector(`label[for="${checkbox.id}"]`);
        if (label) {
            checkbox.value = label.textContent.trim();
        }
    });
});

const stepFour = document.querySelectorAll(".stepFour");

stepFour.forEach(function (section) {
    const checkboxes = section.querySelectorAll(".form-check-input");

    checkboxes.forEach(function (checkbox) {
        const label = section.querySelector(`label[for="${checkbox.id}"]`);
        if (label) {
            checkbox.value = label.textContent.trim();
        }
    });
});

// Handle Step Navigation and Form Submit
document.addEventListener("DOMContentLoaded", function () {
    const btn = document.getElementById("continueBtn");
    let currentTab = 1;
    const totalTabs = 5;
    const progressSteps = document.querySelectorAll(".progress-step");

    btn.addEventListener("click", function (e) {
        e.preventDefault(); // Stop form from submitting on button click

        if (currentTab < totalTabs) {
            // Switch to next tab
            const currentTabId = `#tab${currentTab}`;
            const nextTabId = `#tab${currentTab + 1}`;

            document
                .querySelector(currentTabId)
                .classList.remove("show", "active");
            document.querySelector(nextTabId).classList.add("show", "active");

            // Update data-bs-target dynamically
            btn.setAttribute("data-bs-target", nextTabId);

            currentTab++;

            // Update progress bar color
            progressSteps.forEach((step) => {
                const stepNum = parseInt(step.getAttribute("data-step"));
                step.style.backgroundColor =
                    stepNum === currentTab ? "#0d6efd" : "#ccc";
            });

            // If it's the last tab, change button text
            if (currentTab === totalTabs) {
                btn.textContent = "Submit";
                btn.removeAttribute("data-bs-toggle"); // Remove tab switching
                btn.setAttribute("type", "submit");
            }
        } else {
            if (true ) {
                document.getElementById("multiStepForm").submit();
            } else {
                alert("Please fill all the required fields");
            }
        }
    });

    // Set initial progress
    progressSteps.forEach((step) => {
        const stepNum = parseInt(step.getAttribute("data-step"));
        step.style.backgroundColor =
            stepNum === currentTab ? "#0d6efd" : "#ccc";
    });

    function validateForm() {
        let inputs = document.querySelectorAll("#multiStepForm input");
        for (let input of inputs) {
            if (input.value.trim() === "") {
                return false;
            }
        }
        return true;
    }
});

// Handle Checkboxes and Update Selected Input Field
document.addEventListener("DOMContentLoaded", function () {
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

    // Use the function for each section
    handleCheckboxSection(".service-section", ".select-services");
    handleCheckboxSection(".subCategory", ".sub-category-input");
    handleCheckboxSection(".remodelType", ".remodel-type-input");
    handleCheckboxSection(".requirement", ".requirements-input");
});

