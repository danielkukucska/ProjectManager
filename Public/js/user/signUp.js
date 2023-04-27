function validateSignUp(event) {
  const signUpDTOSchema = Zod.object({
    name: Zod.string().min(3).max(255),
    email: Zod.string().email(),
    password: Zod.string().min(3).max(255),
  }).strict();

  const formData = Object.fromEntries(new FormData(event.target));

  return validateForm(formData, signUpDTOSchema);
}
