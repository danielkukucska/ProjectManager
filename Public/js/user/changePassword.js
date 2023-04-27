function validateChangePassword(event) {
  const changePasswordDTOSchema = Zod.object({
    email: Zod.string().email(),
    currentPassword: Zod.string().min(3).max(255),
    newPassword: Zod.string().min(3).max(255),
    action: Zod.string(),
  }).strict();

  const formData = Object.fromEntries(new FormData(event.target));

  return validateForm(formData, changePasswordDTOSchema);
}
