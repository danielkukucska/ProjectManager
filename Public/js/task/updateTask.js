function validateUpdateTask(event) {
    const updateTaskDTOSchema = Zod.object({
      name: Zod.string().min(3).max(255),
      description: Zod.string().min(3).max(255),
      status: Zod.string().refine(val => ["TO DO", "In Progress", "Done"].includes(val),{message: "Status should be TO DO or In Progress or Done"}),
    }).strict();
  
    const formData = Object.fromEntries(new FormData(event.target));
  
    return validateForm(formData, updateTaskDTOSchema);
  }

  function validateAddAssignee(event) {
    const addAssigneeDTOSchema = Zod.object({
        userId: Zod.string().transform((val, ctx) => {
        const parsed = parseInt(val);
        if (isNaN(parsed)) {
          ctx.addIssue({
            code: Zod.ZodIssueCode.custom,
            message: "Not a number",
          });
          return Zod.NEVER;
        }
        return parsed;
      })
    }).strict();
  
    const formData = Object.fromEntries(new FormData(event.target));
  
    return validateForm(formData, addAssigneeDTOSchema);
  }

  