function validateCreateTask(event) {
  const createTaskDTOSchema = Zod.object({
    name: Zod.string().min(3).max(255),
    description: Zod.string().min(3).max(255),
  }).strict();

  const formData = Object.fromEntries(new FormData(event.target));

  return validateForm(formData, createTaskDTOSchema);
}
