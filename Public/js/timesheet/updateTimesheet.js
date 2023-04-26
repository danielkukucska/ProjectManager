function validateCreateTimesheetLine(event) {
  const createTimesheetLineDTOSchema = Zod.object({
    taskId: Zod.string().transform((val, ctx) => {
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
  }).strict();

  const formData = Object.fromEntries(new FormData(event.target));

  return validateForm(formData, createTimesheetLineDTOSchema);
}

function validateUpdateTimesheetLine(event) {
  const updateTimesheetLineDTOSchema = Zod.record(
    Zod.string().transform((val, ctx) => {
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
    Zod.string().transform((val, ctx) => {
      const parsed = parseInt(val);
      if (isNaN(parsed)) {
        ctx.addIssue({
          code: Zod.ZodIssueCode.custom,
          message: "Not a number",
        });
        return Zod.NEVER;
      }
      if (parsed < 0 || parsed > 12) {
        ctx.addIssue({
          code: Zod.ZodIssueCode.custom,
          message: "Hours must be between 0 and 12",
        });
        return Zod.NEVER;
      }
      return parsed;
    })
  );

  const formData = Object.fromEntries(new FormData(event.target));

  return validateForm(formData, updateTimesheetLineDTOSchema);
}
