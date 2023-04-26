function validateUpdateProject(event) {
    const updateProjectDTOSchema = Zod.object({
      name: Zod.string().min(3).max(255),
      description: Zod.string().min(3).max(255),
      startDate: Zod.string().transform((val, ctx) => {
        const parsed = new Date(val);
        if (isNaN(parsed.getTime())) {
          ctx.addIssue({
            code: Zod.ZodIssueCode.custom,
            message: "Not a valid date",
          });
          return Zod.NEVER;
        }
        return parsed;
      }),
      endDate: Zod.string().transform((val, ctx) => {
        const parsed = new Date(val);
        if (isNaN(parsed.getTime())) {
          ctx.addIssue({
            code: Zod.ZodIssueCode.custom,
            message: "Not a valid date",
          });
          return Zod.NEVER;
        }
        return parsed;
      }),
      ownerId: Zod.string().transform((val, ctx) => {
        const parsed = parseInt(val);
        if (isNaN(parsed)) {
          ctx.addIssue({
            code: Zod.ZodIssueCode.custom,
            message: "Not a number",
          });
          return Zod.NEVER;
        }
        return parsed;
      }),
    })
      .strict()
      .superRefine((val, ctx) => {
        if (new Date(val.startDate) > new Date(val.endDate)) {
          ctx.addIssue({
            code: Zod.ZodIssueCode.custom,
            message: "End Date should be after Start Date.",
            path: ["endDate", "startDate"]
          });
        }
      });
  
    const formData = Object.fromEntries(new FormData(event.target));
  
    return validateForm(formData, updateProjectDTOSchema);
  }
  