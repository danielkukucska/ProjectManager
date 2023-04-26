function validateForm(formData, schema) {
  const parseResult = schema.safeParse(formData);

  clearErrors();

  if (parseResult.success === true) return true;

  const error = parseResult.error.flatten();
  console.log("error", error);
  [...Object.keys(error.fieldErrors), ...Object.keys(error.formErrors)].forEach(
    (key) => {
      const input = document.getElementById(key);
      input.classList.add("error");
    }
  );

  return false;
}

function clearErrors() {
  const errorElements = document.querySelectorAll(".error");
  errorElements.forEach((element) => {
    element.classList.remove("error");
  });
}
