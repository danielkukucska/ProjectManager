function validateForm(formData, schema) {
  const parseResult = schema.safeParse(formData);

  console.log("formData", formData);

  if (parseResult.success === true) return true;

  const error = parseResult.error.flatten();

  [...Object.keys(error.fieldErrors), ...Object.keys(error.formErrors)].forEach(
    (key) => {
      const input = document.getElementById(key);
      input.classList.add("error");
    }
  );

  return false;
}
