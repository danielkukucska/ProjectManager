(() => {
	"use strict";
	var e,
		t,
		a = {
			d: (e, t) => {
				for (var s in t) a.o(t, s) && !a.o(e, s) && Object.defineProperty(e, s, { enumerable: !0, get: t[s] });
			},
			o: (e, t) => Object.prototype.hasOwnProperty.call(e, t),
			r: (e) => {
				"undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, { value: "Module" }), Object.defineProperty(e, "__esModule", { value: !0 });
			},
		},
		s = {};
	a.r(s),
		a.d(s, {
			BRAND: () => be,
			DIRTY: () => v,
			EMPTY_PATH: () => m,
			INVALID: () => _,
			NEVER: () => pt,
			OK: () => g,
			ParseStatus: () => y,
			Schema: () => S,
			ZodAny: () => W,
			ZodArray: () => H,
			ZodBigInt: () => z,
			ZodBoolean: () => V,
			ZodBranded: () => ke,
			ZodCatch: () => ge,
			ZodDate: () => U,
			ZodDefault: () => ve,
			ZodDiscriminatedUnion: () => te,
			ZodEffects: () => fe,
			ZodEnum: () => pe,
			ZodError: () => d,
			ZodFirstPartyTypeKind: () => Oe,
			ZodFunction: () => de,
			ZodIntersection: () => se,
			ZodIssueCode: () => i,
			ZodLazy: () => ce,
			ZodLiteral: () => ue,
			ZodMap: () => ie,
			ZodNaN: () => xe,
			ZodNativeEnum: () => he,
			ZodNever: () => J,
			ZodNull: () => F,
			ZodNullable: () => _e,
			ZodNumber: () => D,
			ZodObject: () => X,
			ZodOptional: () => ye,
			ZodParsedType: () => n,
			ZodPipeline: () => Ze,
			ZodPromise: () => me,
			ZodRecord: () => re,
			ZodSchema: () => S,
			ZodSet: () => oe,
			ZodString: () => $,
			ZodSymbol: () => K,
			ZodTransformer: () => fe,
			ZodTuple: () => ne,
			ZodType: () => S,
			ZodUndefined: () => B,
			ZodUnion: () => Q,
			ZodUnknown: () => q,
			ZodVoid: () => Y,
			addIssueToContext: () => f,
			any: () => $e,
			array: () => Ve,
			bigint: () => je,
			boolean: () => Ie,
			coerce: () => lt,
			custom: () => we,
			date: () => Pe,
			default: () => ht,
			defaultErrorMap: () => c,
			discriminatedUnion: () => Fe,
			effect: () => st,
			enum: () => et,
			function: () => Ge,
			getErrorMap: () => p,
			getParsedType: () => r,
			instanceof: () => Ne,
			intersection: () => We,
			isAborted: () => x,
			isAsync: () => Z,
			isDirty: () => b,
			isValid: () => k,
			late: () => Te,
			lazy: () => Xe,
			literal: () => Qe,
			makeIssue: () => h,
			map: () => Ye,
			nan: () => Ce,
			nativeEnum: () => tt,
			never: () => De,
			null: () => Me,
			nullable: () => rt,
			number: () => Ee,
			object: () => Ue,
			objectUtil: () => t,
			oboolean: () => ut,
			onumber: () => ct,
			optional: () => nt,
			ostring: () => dt,
			pipeline: () => ot,
			preprocess: () => it,
			promise: () => at,
			quotelessJson: () => o,
			record: () => Je,
			set: () => He,
			setErrorMap: () => l,
			strictObject: () => Ke,
			string: () => Se,
			symbol: () => Re,
			transformer: () => st,
			tuple: () => qe,
			undefined: () => Ae,
			union: () => Be,
			unknown: () => Le,
			util: () => e,
			void: () => ze,
			z: () => ht,
		}),
		(function (e) {
			(e.assertEqual = (e) => e),
				(e.assertIs = function (e) {}),
				(e.assertNever = function (e) {
					throw new Error();
				}),
				(e.arrayToEnum = (e) => {
					const t = {};
					for (const a of e) t[a] = a;
					return t;
				}),
				(e.getValidEnumValues = (t) => {
					const a = e.objectKeys(t).filter((e) => "number" != typeof t[t[e]]),
						s = {};
					for (const e of a) s[e] = t[e];
					return e.objectValues(s);
				}),
				(e.objectValues = (t) =>
					e.objectKeys(t).map(function (e) {
						return t[e];
					})),
				(e.objectKeys =
					"function" == typeof Object.keys
						? (e) => Object.keys(e)
						: (e) => {
								const t = [];
								for (const a in e) Object.prototype.hasOwnProperty.call(e, a) && t.push(a);
								return t;
						  }),
				(e.find = (e, t) => {
					for (const a of e) if (t(a)) return a;
				}),
				(e.isInteger = "function" == typeof Number.isInteger ? (e) => Number.isInteger(e) : (e) => "number" == typeof e && isFinite(e) && Math.floor(e) === e),
				(e.joinValues = function (e, t = " | ") {
					return e.map((e) => ("string" == typeof e ? `'${e}'` : e)).join(t);
				}),
				(e.jsonStringifyReplacer = (e, t) => ("bigint" == typeof t ? t.toString() : t));
		})(e || (e = {})),
		(function (e) {
			e.mergeShapes = (e, t) => ({ ...e, ...t });
		})(t || (t = {}));
	const n = e.arrayToEnum(["string", "nan", "number", "integer", "float", "boolean", "date", "bigint", "symbol", "function", "undefined", "null", "array", "object", "unknown", "promise", "void", "never", "map", "set"]),
		r = (e) => {
			switch (typeof e) {
				case "undefined":
					return n.undefined;
				case "string":
					return n.string;
				case "number":
					return isNaN(e) ? n.nan : n.number;
				case "boolean":
					return n.boolean;
				case "function":
					return n.function;
				case "bigint":
					return n.bigint;
				case "symbol":
					return n.symbol;
				case "object":
					return Array.isArray(e)
						? n.array
						: null === e
						? n.null
						: e.then && "function" == typeof e.then && e.catch && "function" == typeof e.catch
						? n.promise
						: "undefined" != typeof Map && e instanceof Map
						? n.map
						: "undefined" != typeof Set && e instanceof Set
						? n.set
						: "undefined" != typeof Date && e instanceof Date
						? n.date
						: n.object;
				default:
					return n.unknown;
			}
		},
		i = e.arrayToEnum([
			"invalid_type",
			"invalid_literal",
			"custom",
			"invalid_union",
			"invalid_union_discriminator",
			"invalid_enum_value",
			"unrecognized_keys",
			"invalid_arguments",
			"invalid_return_type",
			"invalid_date",
			"invalid_string",
			"too_small",
			"too_big",
			"invalid_intersection_types",
			"not_multiple_of",
			"not_finite",
		]),
		o = (e) => JSON.stringify(e, null, 2).replace(/"([^"]+)":/g, "$1:");
	class d extends Error {
		constructor(e) {
			super(),
				(this.issues = []),
				(this.addIssue = (e) => {
					this.issues = [...this.issues, e];
				}),
				(this.addIssues = (e = []) => {
					this.issues = [...this.issues, ...e];
				});
			const t = new.target.prototype;
			Object.setPrototypeOf ? Object.setPrototypeOf(this, t) : (this.__proto__ = t), (this.name = "ZodError"), (this.issues = e);
		}
		get errors() {
			return this.issues;
		}
		format(e) {
			const t =
					e ||
					function (e) {
						return e.message;
					},
				a = { _errors: [] },
				s = (e) => {
					for (const n of e.issues)
						if ("invalid_union" === n.code) n.unionErrors.map(s);
						else if ("invalid_return_type" === n.code) s(n.returnTypeError);
						else if ("invalid_arguments" === n.code) s(n.argumentsError);
						else if (0 === n.path.length) a._errors.push(t(n));
						else {
							let e = a,
								s = 0;
							for (; s < n.path.length; ) {
								const a = n.path[s];
								s === n.path.length - 1 ? ((e[a] = e[a] || { _errors: [] }), e[a]._errors.push(t(n))) : (e[a] = e[a] || { _errors: [] }), (e = e[a]), s++;
							}
						}
				};
			return s(this), a;
		}
		toString() {
			return this.message;
		}
		get message() {
			return JSON.stringify(this.issues, e.jsonStringifyReplacer, 2);
		}
		get isEmpty() {
			return 0 === this.issues.length;
		}
		flatten(e = (e) => e.message) {
			const t = {},
				a = [];
			for (const s of this.issues) s.path.length > 0 ? ((t[s.path[0]] = t[s.path[0]] || []), t[s.path[0]].push(e(s))) : a.push(e(s));
			return { formErrors: a, fieldErrors: t };
		}
		get formErrors() {
			return this.flatten();
		}
	}
	d.create = (e) => new d(e);
	const c = (t, a) => {
		let s;
		switch (t.code) {
			case i.invalid_type:
				s = t.received === n.undefined ? "Required" : `Expected ${t.expected}, received ${t.received}`;
				break;
			case i.invalid_literal:
				s = `Invalid literal value, expected ${JSON.stringify(t.expected, e.jsonStringifyReplacer)}`;
				break;
			case i.unrecognized_keys:
				s = `Unrecognized key(s) in object: ${e.joinValues(t.keys, ", ")}`;
				break;
			case i.invalid_union:
				s = "Invalid input";
				break;
			case i.invalid_union_discriminator:
				s = `Invalid discriminator value. Expected ${e.joinValues(t.options)}`;
				break;
			case i.invalid_enum_value:
				s = `Invalid enum value. Expected ${e.joinValues(t.options)}, received '${t.received}'`;
				break;
			case i.invalid_arguments:
				s = "Invalid function arguments";
				break;
			case i.invalid_return_type:
				s = "Invalid function return type";
				break;
			case i.invalid_date:
				s = "Invalid date";
				break;
			case i.invalid_string:
				"object" == typeof t.validation
					? "includes" in t.validation
						? ((s = `Invalid input: must include "${t.validation.includes}"`), "number" == typeof t.validation.position && (s = `${s} at one or more positions greater than or equal to ${t.validation.position}`))
						: "startsWith" in t.validation
						? (s = `Invalid input: must start with "${t.validation.startsWith}"`)
						: "endsWith" in t.validation
						? (s = `Invalid input: must end with "${t.validation.endsWith}"`)
						: e.assertNever(t.validation)
					: (s = "regex" !== t.validation ? `Invalid ${t.validation}` : "Invalid");
				break;
			case i.too_small:
				s =
					"array" === t.type
						? `Array must contain ${t.exact ? "exactly" : t.inclusive ? "at least" : "more than"} ${t.minimum} element(s)`
						: "string" === t.type
						? `String must contain ${t.exact ? "exactly" : t.inclusive ? "at least" : "over"} ${t.minimum} character(s)`
						: "number" === t.type
						? `Number must be ${t.exact ? "exactly equal to " : t.inclusive ? "greater than or equal to " : "greater than "}${t.minimum}`
						: "date" === t.type
						? `Date must be ${t.exact ? "exactly equal to " : t.inclusive ? "greater than or equal to " : "greater than "}${new Date(Number(t.minimum))}`
						: "Invalid input";
				break;
			case i.too_big:
				s =
					"array" === t.type
						? `Array must contain ${t.exact ? "exactly" : t.inclusive ? "at most" : "less than"} ${t.maximum} element(s)`
						: "string" === t.type
						? `String must contain ${t.exact ? "exactly" : t.inclusive ? "at most" : "under"} ${t.maximum} character(s)`
						: "number" === t.type
						? `Number must be ${t.exact ? "exactly" : t.inclusive ? "less than or equal to" : "less than"} ${t.maximum}`
						: "bigint" === t.type
						? `BigInt must be ${t.exact ? "exactly" : t.inclusive ? "less than or equal to" : "less than"} ${t.maximum}`
						: "date" === t.type
						? `Date must be ${t.exact ? "exactly" : t.inclusive ? "smaller than or equal to" : "smaller than"} ${new Date(Number(t.maximum))}`
						: "Invalid input";
				break;
			case i.custom:
				s = "Invalid input";
				break;
			case i.invalid_intersection_types:
				s = "Intersection results could not be merged";
				break;
			case i.not_multiple_of:
				s = `Number must be a multiple of ${t.multipleOf}`;
				break;
			case i.not_finite:
				s = "Number must be finite";
				break;
			default:
				(s = a.defaultError), e.assertNever(t);
		}
		return { message: s };
	};
	let u = c;
	function l(e) {
		u = e;
	}
	function p() {
		return u;
	}
	const h = (e) => {
			const { data: t, path: a, errorMaps: s, issueData: n } = e,
				r = [...a, ...(n.path || [])],
				i = { ...n, path: r };
			let o = "";
			const d = s
				.filter((e) => !!e)
				.slice()
				.reverse();
			for (const e of d) o = e(i, { data: t, defaultError: o }).message;
			return { ...n, path: r, message: n.message || o };
		},
		m = [];
	function f(e, t) {
		const a = h({ issueData: t, data: e.data, path: e.path, errorMaps: [e.common.contextualErrorMap, e.schemaErrorMap, p(), c].filter((e) => !!e) });
		e.common.issues.push(a);
	}
	class y {
		constructor() {
			this.value = "valid";
		}
		dirty() {
			"valid" === this.value && (this.value = "dirty");
		}
		abort() {
			"aborted" !== this.value && (this.value = "aborted");
		}
		static mergeArray(e, t) {
			const a = [];
			for (const s of t) {
				if ("aborted" === s.status) return _;
				"dirty" === s.status && e.dirty(), a.push(s.value);
			}
			return { status: e.value, value: a };
		}
		static async mergeObjectAsync(e, t) {
			const a = [];
			for (const e of t) a.push({ key: await e.key, value: await e.value });
			return y.mergeObjectSync(e, a);
		}
		static mergeObjectSync(e, t) {
			const a = {};
			for (const s of t) {
				const { key: t, value: n } = s;
				if ("aborted" === t.status) return _;
				if ("aborted" === n.status) return _;
				"dirty" === t.status && e.dirty(), "dirty" === n.status && e.dirty(), (void 0 !== n.value || s.alwaysSet) && (a[t.value] = n.value);
			}
			return { status: e.value, value: a };
		}
	}
	const _ = Object.freeze({ status: "aborted" }),
		v = (e) => ({ status: "dirty", value: e }),
		g = (e) => ({ status: "valid", value: e }),
		x = (e) => "aborted" === e.status,
		b = (e) => "dirty" === e.status,
		k = (e) => "valid" === e.status,
		Z = (e) => "undefined" != typeof Promise && e instanceof Promise;
	var w;
	!(function (e) {
		(e.errToObj = (e) => ("string" == typeof e ? { message: e } : e || {})), (e.toString = (e) => ("string" == typeof e ? e : null == e ? void 0 : e.message));
	})(w || (w = {}));
	class T {
		constructor(e, t, a, s) {
			(this._cachedPath = []), (this.parent = e), (this.data = t), (this._path = a), (this._key = s);
		}
		get path() {
			return this._cachedPath.length || (this._key instanceof Array ? this._cachedPath.push(...this._path, ...this._key) : this._cachedPath.push(...this._path, this._key)), this._cachedPath;
		}
	}
	const O = (e, t) => {
		if (k(t)) return { success: !0, data: t.value };
		if (!e.common.issues.length) throw new Error("Validation failed but no issues detected.");
		return {
			success: !1,
			get error() {
				if (this._error) return this._error;
				const t = new d(e.common.issues);
				return (this._error = t), this._error;
			},
		};
	};
	function N(e) {
		if (!e) return {};
		const { errorMap: t, invalid_type_error: a, required_error: s, description: n } = e;
		if (t && (a || s)) throw new Error('Can\'t use "invalid_type_error" or "required_error" in conjunction with custom error map.');
		return t
			? { errorMap: t, description: n }
			: { errorMap: (e, t) => ("invalid_type" !== e.code ? { message: t.defaultError } : void 0 === t.data ? { message: null != s ? s : t.defaultError } : { message: null != a ? a : t.defaultError }), description: n };
	}
	class S {
		constructor(e) {
			(this.spa = this.safeParseAsync),
				(this._def = e),
				(this.parse = this.parse.bind(this)),
				(this.safeParse = this.safeParse.bind(this)),
				(this.parseAsync = this.parseAsync.bind(this)),
				(this.safeParseAsync = this.safeParseAsync.bind(this)),
				(this.spa = this.spa.bind(this)),
				(this.refine = this.refine.bind(this)),
				(this.refinement = this.refinement.bind(this)),
				(this.superRefine = this.superRefine.bind(this)),
				(this.optional = this.optional.bind(this)),
				(this.nullable = this.nullable.bind(this)),
				(this.nullish = this.nullish.bind(this)),
				(this.array = this.array.bind(this)),
				(this.promise = this.promise.bind(this)),
				(this.or = this.or.bind(this)),
				(this.and = this.and.bind(this)),
				(this.transform = this.transform.bind(this)),
				(this.brand = this.brand.bind(this)),
				(this.default = this.default.bind(this)),
				(this.catch = this.catch.bind(this)),
				(this.describe = this.describe.bind(this)),
				(this.pipe = this.pipe.bind(this)),
				(this.isNullable = this.isNullable.bind(this)),
				(this.isOptional = this.isOptional.bind(this));
		}
		get description() {
			return this._def.description;
		}
		_getType(e) {
			return r(e.data);
		}
		_getOrReturnCtx(e, t) {
			return t || { common: e.parent.common, data: e.data, parsedType: r(e.data), schemaErrorMap: this._def.errorMap, path: e.path, parent: e.parent };
		}
		_processInputParams(e) {
			return { status: new y(), ctx: { common: e.parent.common, data: e.data, parsedType: r(e.data), schemaErrorMap: this._def.errorMap, path: e.path, parent: e.parent } };
		}
		_parseSync(e) {
			const t = this._parse(e);
			if (Z(t)) throw new Error("Synchronous parse encountered promise.");
			return t;
		}
		_parseAsync(e) {
			const t = this._parse(e);
			return Promise.resolve(t);
		}
		parse(e, t) {
			const a = this.safeParse(e, t);
			if (a.success) return a.data;
			throw a.error;
		}
		safeParse(e, t) {
			var a;
			const s = {
					common: { issues: [], async: null !== (a = null == t ? void 0 : t.async) && void 0 !== a && a, contextualErrorMap: null == t ? void 0 : t.errorMap },
					path: (null == t ? void 0 : t.path) || [],
					schemaErrorMap: this._def.errorMap,
					parent: null,
					data: e,
					parsedType: r(e),
				},
				n = this._parseSync({ data: e, path: s.path, parent: s });
			return O(s, n);
		}
		async parseAsync(e, t) {
			const a = await this.safeParseAsync(e, t);
			if (a.success) return a.data;
			throw a.error;
		}
		async safeParseAsync(e, t) {
			const a = { common: { issues: [], contextualErrorMap: null == t ? void 0 : t.errorMap, async: !0 }, path: (null == t ? void 0 : t.path) || [], schemaErrorMap: this._def.errorMap, parent: null, data: e, parsedType: r(e) },
				s = this._parse({ data: e, path: a.path, parent: a }),
				n = await (Z(s) ? s : Promise.resolve(s));
			return O(a, n);
		}
		refine(e, t) {
			const a = (e) => ("string" == typeof t || void 0 === t ? { message: t } : "function" == typeof t ? t(e) : t);
			return this._refinement((t, s) => {
				const n = e(t),
					r = () => s.addIssue({ code: i.custom, ...a(t) });
				return "undefined" != typeof Promise && n instanceof Promise ? n.then((e) => !!e || (r(), !1)) : !!n || (r(), !1);
			});
		}
		refinement(e, t) {
			return this._refinement((a, s) => !!e(a) || (s.addIssue("function" == typeof t ? t(a, s) : t), !1));
		}
		_refinement(e) {
			return new fe({ schema: this, typeName: Oe.ZodEffects, effect: { type: "refinement", refinement: e } });
		}
		superRefine(e) {
			return this._refinement(e);
		}
		optional() {
			return ye.create(this, this._def);
		}
		nullable() {
			return _e.create(this, this._def);
		}
		nullish() {
			return this.nullable().optional();
		}
		array() {
			return H.create(this, this._def);
		}
		promise() {
			return me.create(this, this._def);
		}
		or(e) {
			return Q.create([this, e], this._def);
		}
		and(e) {
			return se.create(this, e, this._def);
		}
		transform(e) {
			return new fe({ ...N(this._def), schema: this, typeName: Oe.ZodEffects, effect: { type: "transform", transform: e } });
		}
		default(e) {
			const t = "function" == typeof e ? e : () => e;
			return new ve({ ...N(this._def), innerType: this, defaultValue: t, typeName: Oe.ZodDefault });
		}
		brand() {
			return new ke({ typeName: Oe.ZodBranded, type: this, ...N(this._def) });
		}
		catch(e) {
			const t = "function" == typeof e ? e : () => e;
			return new ge({ ...N(this._def), innerType: this, catchValue: t, typeName: Oe.ZodCatch });
		}
		describe(e) {
			return new (0, this.constructor)({ ...this._def, description: e });
		}
		pipe(e) {
			return Ze.create(this, e);
		}
		isOptional() {
			return this.safeParse(void 0).success;
		}
		isNullable() {
			return this.safeParse(null).success;
		}
	}
	const E = /^c[^\s-]{8,}$/i,
		C = /^[a-z][a-z0-9]*$/,
		j = /[0-9A-HJKMNP-TV-Z]{26}/,
		I = /^([a-f0-9]{8}-[a-f0-9]{4}-[1-5][a-f0-9]{3}-[a-f0-9]{4}-[a-f0-9]{12}|00000000-0000-0000-0000-000000000000)$/i,
		P =
			/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[(((25[0-5])|(2[0-4][0-9])|(1[0-9]{2})|([0-9]{1,2}))\.){3}((25[0-5])|(2[0-4][0-9])|(1[0-9]{2})|([0-9]{1,2}))\])|(\[IPv6:(([a-f0-9]{1,4}:){7}|::([a-f0-9]{1,4}:){0,6}|([a-f0-9]{1,4}:){1}:([a-f0-9]{1,4}:){0,5}|([a-f0-9]{1,4}:){2}:([a-f0-9]{1,4}:){0,4}|([a-f0-9]{1,4}:){3}:([a-f0-9]{1,4}:){0,3}|([a-f0-9]{1,4}:){4}:([a-f0-9]{1,4}:){0,2}|([a-f0-9]{1,4}:){5}:([a-f0-9]{1,4}:){0,1})([a-f0-9]{1,4}|(((25[0-5])|(2[0-4][0-9])|(1[0-9]{2})|([0-9]{1,2}))\.){3}((25[0-5])|(2[0-4][0-9])|(1[0-9]{2})|([0-9]{1,2})))\])|([A-Za-z0-9]([A-Za-z0-9-]*[A-Za-z0-9])*(\.[A-Za-z]{2,})+))$/,
		R = /^(\p{Extended_Pictographic}|\p{Emoji_Component})+$/u,
		A = /^(((25[0-5])|(2[0-4][0-9])|(1[0-9]{2})|([0-9]{1,2}))\.){3}((25[0-5])|(2[0-4][0-9])|(1[0-9]{2})|([0-9]{1,2}))$/,
		M =
			/^(([a-f0-9]{1,4}:){7}|::([a-f0-9]{1,4}:){0,6}|([a-f0-9]{1,4}:){1}:([a-f0-9]{1,4}:){0,5}|([a-f0-9]{1,4}:){2}:([a-f0-9]{1,4}:){0,4}|([a-f0-9]{1,4}:){3}:([a-f0-9]{1,4}:){0,3}|([a-f0-9]{1,4}:){4}:([a-f0-9]{1,4}:){0,2}|([a-f0-9]{1,4}:){5}:([a-f0-9]{1,4}:){0,1})([a-f0-9]{1,4}|(((25[0-5])|(2[0-4][0-9])|(1[0-9]{2})|([0-9]{1,2}))\.){3}((25[0-5])|(2[0-4][0-9])|(1[0-9]{2})|([0-9]{1,2})))$/;
	class $ extends S {
		constructor() {
			super(...arguments),
				(this._regex = (e, t, a) => this.refinement((t) => e.test(t), { validation: t, code: i.invalid_string, ...w.errToObj(a) })),
				(this.nonempty = (e) => this.min(1, w.errToObj(e))),
				(this.trim = () => new $({ ...this._def, checks: [...this._def.checks, { kind: "trim" }] })),
				(this.toLowerCase = () => new $({ ...this._def, checks: [...this._def.checks, { kind: "toLowerCase" }] })),
				(this.toUpperCase = () => new $({ ...this._def, checks: [...this._def.checks, { kind: "toUpperCase" }] }));
		}
		_parse(t) {
			if ((this._def.coerce && (t.data = String(t.data)), this._getType(t) !== n.string)) {
				const e = this._getOrReturnCtx(t);
				return f(e, { code: i.invalid_type, expected: n.string, received: e.parsedType }), _;
			}
			const a = new y();
			let s;
			for (const n of this._def.checks)
				if ("min" === n.kind) t.data.length < n.value && ((s = this._getOrReturnCtx(t, s)), f(s, { code: i.too_small, minimum: n.value, type: "string", inclusive: !0, exact: !1, message: n.message }), a.dirty());
				else if ("max" === n.kind) t.data.length > n.value && ((s = this._getOrReturnCtx(t, s)), f(s, { code: i.too_big, maximum: n.value, type: "string", inclusive: !0, exact: !1, message: n.message }), a.dirty());
				else if ("length" === n.kind) {
					const e = t.data.length > n.value,
						r = t.data.length < n.value;
					(e || r) &&
						((s = this._getOrReturnCtx(t, s)),
						e ? f(s, { code: i.too_big, maximum: n.value, type: "string", inclusive: !0, exact: !0, message: n.message }) : r && f(s, { code: i.too_small, minimum: n.value, type: "string", inclusive: !0, exact: !0, message: n.message }),
						a.dirty());
				} else if ("email" === n.kind) P.test(t.data) || ((s = this._getOrReturnCtx(t, s)), f(s, { validation: "email", code: i.invalid_string, message: n.message }), a.dirty());
				else if ("emoji" === n.kind) R.test(t.data) || ((s = this._getOrReturnCtx(t, s)), f(s, { validation: "emoji", code: i.invalid_string, message: n.message }), a.dirty());
				else if ("uuid" === n.kind) I.test(t.data) || ((s = this._getOrReturnCtx(t, s)), f(s, { validation: "uuid", code: i.invalid_string, message: n.message }), a.dirty());
				else if ("cuid" === n.kind) E.test(t.data) || ((s = this._getOrReturnCtx(t, s)), f(s, { validation: "cuid", code: i.invalid_string, message: n.message }), a.dirty());
				else if ("cuid2" === n.kind) C.test(t.data) || ((s = this._getOrReturnCtx(t, s)), f(s, { validation: "cuid2", code: i.invalid_string, message: n.message }), a.dirty());
				else if ("ulid" === n.kind) j.test(t.data) || ((s = this._getOrReturnCtx(t, s)), f(s, { validation: "ulid", code: i.invalid_string, message: n.message }), a.dirty());
				else if ("url" === n.kind)
					try {
						new URL(t.data);
					} catch (e) {
						(s = this._getOrReturnCtx(t, s)), f(s, { validation: "url", code: i.invalid_string, message: n.message }), a.dirty();
					}
				else
					"regex" === n.kind
						? ((n.regex.lastIndex = 0), n.regex.test(t.data) || ((s = this._getOrReturnCtx(t, s)), f(s, { validation: "regex", code: i.invalid_string, message: n.message }), a.dirty()))
						: "trim" === n.kind
						? (t.data = t.data.trim())
						: "includes" === n.kind
						? t.data.includes(n.value, n.position) || ((s = this._getOrReturnCtx(t, s)), f(s, { code: i.invalid_string, validation: { includes: n.value, position: n.position }, message: n.message }), a.dirty())
						: "toLowerCase" === n.kind
						? (t.data = t.data.toLowerCase())
						: "toUpperCase" === n.kind
						? (t.data = t.data.toUpperCase())
						: "startsWith" === n.kind
						? t.data.startsWith(n.value) || ((s = this._getOrReturnCtx(t, s)), f(s, { code: i.invalid_string, validation: { startsWith: n.value }, message: n.message }), a.dirty())
						: "endsWith" === n.kind
						? t.data.endsWith(n.value) || ((s = this._getOrReturnCtx(t, s)), f(s, { code: i.invalid_string, validation: { endsWith: n.value }, message: n.message }), a.dirty())
						: "datetime" === n.kind
						? ((d = n).precision
								? d.offset
									? new RegExp(`^\\d{4}-\\d{2}-\\d{2}T\\d{2}:\\d{2}:\\d{2}\\.\\d{${d.precision}}(([+-]\\d{2}(:?\\d{2})?)|Z)$`)
									: new RegExp(`^\\d{4}-\\d{2}-\\d{2}T\\d{2}:\\d{2}:\\d{2}\\.\\d{${d.precision}}Z$`)
								: 0 === d.precision
								? d.offset
									? new RegExp("^\\d{4}-\\d{2}-\\d{2}T\\d{2}:\\d{2}:\\d{2}(([+-]\\d{2}(:?\\d{2})?)|Z)$")
									: new RegExp("^\\d{4}-\\d{2}-\\d{2}T\\d{2}:\\d{2}:\\d{2}Z$")
								: d.offset
								? new RegExp("^\\d{4}-\\d{2}-\\d{2}T\\d{2}:\\d{2}:\\d{2}(\\.\\d+)?(([+-]\\d{2}(:?\\d{2})?)|Z)$")
								: new RegExp("^\\d{4}-\\d{2}-\\d{2}T\\d{2}:\\d{2}:\\d{2}(\\.\\d+)?Z$")
						  ).test(t.data) || ((s = this._getOrReturnCtx(t, s)), f(s, { code: i.invalid_string, validation: "datetime", message: n.message }), a.dirty())
						: "ip" === n.kind
						? ((r = t.data), (("v4" !== (o = n.version) && o) || !A.test(r)) && (("v6" !== o && o) || !M.test(r)) && ((s = this._getOrReturnCtx(t, s)), f(s, { validation: "ip", code: i.invalid_string, message: n.message }), a.dirty()))
						: e.assertNever(n);
			var r, o, d;
			return { status: a.value, value: t.data };
		}
		_addCheck(e) {
			return new $({ ...this._def, checks: [...this._def.checks, e] });
		}
		email(e) {
			return this._addCheck({ kind: "email", ...w.errToObj(e) });
		}
		url(e) {
			return this._addCheck({ kind: "url", ...w.errToObj(e) });
		}
		emoji(e) {
			return this._addCheck({ kind: "emoji", ...w.errToObj(e) });
		}
		uuid(e) {
			return this._addCheck({ kind: "uuid", ...w.errToObj(e) });
		}
		cuid(e) {
			return this._addCheck({ kind: "cuid", ...w.errToObj(e) });
		}
		cuid2(e) {
			return this._addCheck({ kind: "cuid2", ...w.errToObj(e) });
		}
		ulid(e) {
			return this._addCheck({ kind: "ulid", ...w.errToObj(e) });
		}
		ip(e) {
			return this._addCheck({ kind: "ip", ...w.errToObj(e) });
		}
		datetime(e) {
			var t;
			return "string" == typeof e
				? this._addCheck({ kind: "datetime", precision: null, offset: !1, message: e })
				: this._addCheck({
						kind: "datetime",
						precision: void 0 === (null == e ? void 0 : e.precision) ? null : null == e ? void 0 : e.precision,
						offset: null !== (t = null == e ? void 0 : e.offset) && void 0 !== t && t,
						...w.errToObj(null == e ? void 0 : e.message),
				  });
		}
		regex(e, t) {
			return this._addCheck({ kind: "regex", regex: e, ...w.errToObj(t) });
		}
		includes(e, t) {
			return this._addCheck({ kind: "includes", value: e, position: null == t ? void 0 : t.position, ...w.errToObj(null == t ? void 0 : t.message) });
		}
		startsWith(e, t) {
			return this._addCheck({ kind: "startsWith", value: e, ...w.errToObj(t) });
		}
		endsWith(e, t) {
			return this._addCheck({ kind: "endsWith", value: e, ...w.errToObj(t) });
		}
		min(e, t) {
			return this._addCheck({ kind: "min", value: e, ...w.errToObj(t) });
		}
		max(e, t) {
			return this._addCheck({ kind: "max", value: e, ...w.errToObj(t) });
		}
		length(e, t) {
			return this._addCheck({ kind: "length", value: e, ...w.errToObj(t) });
		}
		get isDatetime() {
			return !!this._def.checks.find((e) => "datetime" === e.kind);
		}
		get isEmail() {
			return !!this._def.checks.find((e) => "email" === e.kind);
		}
		get isURL() {
			return !!this._def.checks.find((e) => "url" === e.kind);
		}
		get isEmoji() {
			return !!this._def.checks.find((e) => "emoji" === e.kind);
		}
		get isUUID() {
			return !!this._def.checks.find((e) => "uuid" === e.kind);
		}
		get isCUID() {
			return !!this._def.checks.find((e) => "cuid" === e.kind);
		}
		get isCUID2() {
			return !!this._def.checks.find((e) => "cuid2" === e.kind);
		}
		get isULID() {
			return !!this._def.checks.find((e) => "ulid" === e.kind);
		}
		get isIP() {
			return !!this._def.checks.find((e) => "ip" === e.kind);
		}
		get minLength() {
			let e = null;
			for (const t of this._def.checks) "min" === t.kind && (null === e || t.value > e) && (e = t.value);
			return e;
		}
		get maxLength() {
			let e = null;
			for (const t of this._def.checks) "max" === t.kind && (null === e || t.value < e) && (e = t.value);
			return e;
		}
	}
	function L(e, t) {
		const a = (e.toString().split(".")[1] || "").length,
			s = (t.toString().split(".")[1] || "").length,
			n = a > s ? a : s;
		return (parseInt(e.toFixed(n).replace(".", "")) % parseInt(t.toFixed(n).replace(".", ""))) / Math.pow(10, n);
	}
	$.create = (e) => {
		var t;
		return new $({ checks: [], typeName: Oe.ZodString, coerce: null !== (t = null == e ? void 0 : e.coerce) && void 0 !== t && t, ...N(e) });
	};
	class D extends S {
		constructor() {
			super(...arguments), (this.min = this.gte), (this.max = this.lte), (this.step = this.multipleOf);
		}
		_parse(t) {
			if ((this._def.coerce && (t.data = Number(t.data)), this._getType(t) !== n.number)) {
				const e = this._getOrReturnCtx(t);
				return f(e, { code: i.invalid_type, expected: n.number, received: e.parsedType }), _;
			}
			let a;
			const s = new y();
			for (const n of this._def.checks)
				"int" === n.kind
					? e.isInteger(t.data) || ((a = this._getOrReturnCtx(t, a)), f(a, { code: i.invalid_type, expected: "integer", received: "float", message: n.message }), s.dirty())
					: "min" === n.kind
					? (n.inclusive ? t.data < n.value : t.data <= n.value) && ((a = this._getOrReturnCtx(t, a)), f(a, { code: i.too_small, minimum: n.value, type: "number", inclusive: n.inclusive, exact: !1, message: n.message }), s.dirty())
					: "max" === n.kind
					? (n.inclusive ? t.data > n.value : t.data >= n.value) && ((a = this._getOrReturnCtx(t, a)), f(a, { code: i.too_big, maximum: n.value, type: "number", inclusive: n.inclusive, exact: !1, message: n.message }), s.dirty())
					: "multipleOf" === n.kind
					? 0 !== L(t.data, n.value) && ((a = this._getOrReturnCtx(t, a)), f(a, { code: i.not_multiple_of, multipleOf: n.value, message: n.message }), s.dirty())
					: "finite" === n.kind
					? Number.isFinite(t.data) || ((a = this._getOrReturnCtx(t, a)), f(a, { code: i.not_finite, message: n.message }), s.dirty())
					: e.assertNever(n);
			return { status: s.value, value: t.data };
		}
		gte(e, t) {
			return this.setLimit("min", e, !0, w.toString(t));
		}
		gt(e, t) {
			return this.setLimit("min", e, !1, w.toString(t));
		}
		lte(e, t) {
			return this.setLimit("max", e, !0, w.toString(t));
		}
		lt(e, t) {
			return this.setLimit("max", e, !1, w.toString(t));
		}
		setLimit(e, t, a, s) {
			return new D({ ...this._def, checks: [...this._def.checks, { kind: e, value: t, inclusive: a, message: w.toString(s) }] });
		}
		_addCheck(e) {
			return new D({ ...this._def, checks: [...this._def.checks, e] });
		}
		int(e) {
			return this._addCheck({ kind: "int", message: w.toString(e) });
		}
		positive(e) {
			return this._addCheck({ kind: "min", value: 0, inclusive: !1, message: w.toString(e) });
		}
		negative(e) {
			return this._addCheck({ kind: "max", value: 0, inclusive: !1, message: w.toString(e) });
		}
		nonpositive(e) {
			return this._addCheck({ kind: "max", value: 0, inclusive: !0, message: w.toString(e) });
		}
		nonnegative(e) {
			return this._addCheck({ kind: "min", value: 0, inclusive: !0, message: w.toString(e) });
		}
		multipleOf(e, t) {
			return this._addCheck({ kind: "multipleOf", value: e, message: w.toString(t) });
		}
		finite(e) {
			return this._addCheck({ kind: "finite", message: w.toString(e) });
		}
		safe(e) {
			return this._addCheck({ kind: "min", inclusive: !0, value: Number.MIN_SAFE_INTEGER, message: w.toString(e) })._addCheck({ kind: "max", inclusive: !0, value: Number.MAX_SAFE_INTEGER, message: w.toString(e) });
		}
		get minValue() {
			let e = null;
			for (const t of this._def.checks) "min" === t.kind && (null === e || t.value > e) && (e = t.value);
			return e;
		}
		get maxValue() {
			let e = null;
			for (const t of this._def.checks) "max" === t.kind && (null === e || t.value < e) && (e = t.value);
			return e;
		}
		get isInt() {
			return !!this._def.checks.find((t) => "int" === t.kind || ("multipleOf" === t.kind && e.isInteger(t.value)));
		}
		get isFinite() {
			let e = null,
				t = null;
			for (const a of this._def.checks) {
				if ("finite" === a.kind || "int" === a.kind || "multipleOf" === a.kind) return !0;
				"min" === a.kind ? (null === t || a.value > t) && (t = a.value) : "max" === a.kind && (null === e || a.value < e) && (e = a.value);
			}
			return Number.isFinite(t) && Number.isFinite(e);
		}
	}
	D.create = (e) => new D({ checks: [], typeName: Oe.ZodNumber, coerce: (null == e ? void 0 : e.coerce) || !1, ...N(e) });
	class z extends S {
		constructor() {
			super(...arguments), (this.min = this.gte), (this.max = this.lte);
		}
		_parse(t) {
			if ((this._def.coerce && (t.data = BigInt(t.data)), this._getType(t) !== n.bigint)) {
				const e = this._getOrReturnCtx(t);
				return f(e, { code: i.invalid_type, expected: n.bigint, received: e.parsedType }), _;
			}
			let a;
			const s = new y();
			for (const n of this._def.checks)
				"min" === n.kind
					? (n.inclusive ? t.data < n.value : t.data <= n.value) && ((a = this._getOrReturnCtx(t, a)), f(a, { code: i.too_small, type: "bigint", minimum: n.value, inclusive: n.inclusive, message: n.message }), s.dirty())
					: "max" === n.kind
					? (n.inclusive ? t.data > n.value : t.data >= n.value) && ((a = this._getOrReturnCtx(t, a)), f(a, { code: i.too_big, type: "bigint", maximum: n.value, inclusive: n.inclusive, message: n.message }), s.dirty())
					: "multipleOf" === n.kind
					? t.data % n.value !== BigInt(0) && ((a = this._getOrReturnCtx(t, a)), f(a, { code: i.not_multiple_of, multipleOf: n.value, message: n.message }), s.dirty())
					: e.assertNever(n);
			return { status: s.value, value: t.data };
		}
		gte(e, t) {
			return this.setLimit("min", e, !0, w.toString(t));
		}
		gt(e, t) {
			return this.setLimit("min", e, !1, w.toString(t));
		}
		lte(e, t) {
			return this.setLimit("max", e, !0, w.toString(t));
		}
		lt(e, t) {
			return this.setLimit("max", e, !1, w.toString(t));
		}
		setLimit(e, t, a, s) {
			return new z({ ...this._def, checks: [...this._def.checks, { kind: e, value: t, inclusive: a, message: w.toString(s) }] });
		}
		_addCheck(e) {
			return new z({ ...this._def, checks: [...this._def.checks, e] });
		}
		positive(e) {
			return this._addCheck({ kind: "min", value: BigInt(0), inclusive: !1, message: w.toString(e) });
		}
		negative(e) {
			return this._addCheck({ kind: "max", value: BigInt(0), inclusive: !1, message: w.toString(e) });
		}
		nonpositive(e) {
			return this._addCheck({ kind: "max", value: BigInt(0), inclusive: !0, message: w.toString(e) });
		}
		nonnegative(e) {
			return this._addCheck({ kind: "min", value: BigInt(0), inclusive: !0, message: w.toString(e) });
		}
		multipleOf(e, t) {
			return this._addCheck({ kind: "multipleOf", value: e, message: w.toString(t) });
		}
		get minValue() {
			let e = null;
			for (const t of this._def.checks) "min" === t.kind && (null === e || t.value > e) && (e = t.value);
			return e;
		}
		get maxValue() {
			let e = null;
			for (const t of this._def.checks) "max" === t.kind && (null === e || t.value < e) && (e = t.value);
			return e;
		}
	}
	z.create = (e) => {
		var t;
		return new z({ checks: [], typeName: Oe.ZodBigInt, coerce: null !== (t = null == e ? void 0 : e.coerce) && void 0 !== t && t, ...N(e) });
	};
	class V extends S {
		_parse(e) {
			if ((this._def.coerce && (e.data = Boolean(e.data)), this._getType(e) !== n.boolean)) {
				const t = this._getOrReturnCtx(e);
				return f(t, { code: i.invalid_type, expected: n.boolean, received: t.parsedType }), _;
			}
			return g(e.data);
		}
	}
	V.create = (e) => new V({ typeName: Oe.ZodBoolean, coerce: (null == e ? void 0 : e.coerce) || !1, ...N(e) });
	class U extends S {
		_parse(t) {
			if ((this._def.coerce && (t.data = new Date(t.data)), this._getType(t) !== n.date)) {
				const e = this._getOrReturnCtx(t);
				return f(e, { code: i.invalid_type, expected: n.date, received: e.parsedType }), _;
			}
			if (isNaN(t.data.getTime())) return f(this._getOrReturnCtx(t), { code: i.invalid_date }), _;
			const a = new y();
			let s;
			for (const n of this._def.checks)
				"min" === n.kind
					? t.data.getTime() < n.value && ((s = this._getOrReturnCtx(t, s)), f(s, { code: i.too_small, message: n.message, inclusive: !0, exact: !1, minimum: n.value, type: "date" }), a.dirty())
					: "max" === n.kind
					? t.data.getTime() > n.value && ((s = this._getOrReturnCtx(t, s)), f(s, { code: i.too_big, message: n.message, inclusive: !0, exact: !1, maximum: n.value, type: "date" }), a.dirty())
					: e.assertNever(n);
			return { status: a.value, value: new Date(t.data.getTime()) };
		}
		_addCheck(e) {
			return new U({ ...this._def, checks: [...this._def.checks, e] });
		}
		min(e, t) {
			return this._addCheck({ kind: "min", value: e.getTime(), message: w.toString(t) });
		}
		max(e, t) {
			return this._addCheck({ kind: "max", value: e.getTime(), message: w.toString(t) });
		}
		get minDate() {
			let e = null;
			for (const t of this._def.checks) "min" === t.kind && (null === e || t.value > e) && (e = t.value);
			return null != e ? new Date(e) : null;
		}
		get maxDate() {
			let e = null;
			for (const t of this._def.checks) "max" === t.kind && (null === e || t.value < e) && (e = t.value);
			return null != e ? new Date(e) : null;
		}
	}
	U.create = (e) => new U({ checks: [], coerce: (null == e ? void 0 : e.coerce) || !1, typeName: Oe.ZodDate, ...N(e) });
	class K extends S {
		_parse(e) {
			if (this._getType(e) !== n.symbol) {
				const t = this._getOrReturnCtx(e);
				return f(t, { code: i.invalid_type, expected: n.symbol, received: t.parsedType }), _;
			}
			return g(e.data);
		}
	}
	K.create = (e) => new K({ typeName: Oe.ZodSymbol, ...N(e) });
	class B extends S {
		_parse(e) {
			if (this._getType(e) !== n.undefined) {
				const t = this._getOrReturnCtx(e);
				return f(t, { code: i.invalid_type, expected: n.undefined, received: t.parsedType }), _;
			}
			return g(e.data);
		}
	}
	B.create = (e) => new B({ typeName: Oe.ZodUndefined, ...N(e) });
	class F extends S {
		_parse(e) {
			if (this._getType(e) !== n.null) {
				const t = this._getOrReturnCtx(e);
				return f(t, { code: i.invalid_type, expected: n.null, received: t.parsedType }), _;
			}
			return g(e.data);
		}
	}
	F.create = (e) => new F({ typeName: Oe.ZodNull, ...N(e) });
	class W extends S {
		constructor() {
			super(...arguments), (this._any = !0);
		}
		_parse(e) {
			return g(e.data);
		}
	}
	W.create = (e) => new W({ typeName: Oe.ZodAny, ...N(e) });
	class q extends S {
		constructor() {
			super(...arguments), (this._unknown = !0);
		}
		_parse(e) {
			return g(e.data);
		}
	}
	q.create = (e) => new q({ typeName: Oe.ZodUnknown, ...N(e) });
	class J extends S {
		_parse(e) {
			const t = this._getOrReturnCtx(e);
			return f(t, { code: i.invalid_type, expected: n.never, received: t.parsedType }), _;
		}
	}
	J.create = (e) => new J({ typeName: Oe.ZodNever, ...N(e) });
	class Y extends S {
		_parse(e) {
			if (this._getType(e) !== n.undefined) {
				const t = this._getOrReturnCtx(e);
				return f(t, { code: i.invalid_type, expected: n.void, received: t.parsedType }), _;
			}
			return g(e.data);
		}
	}
	Y.create = (e) => new Y({ typeName: Oe.ZodVoid, ...N(e) });
	class H extends S {
		_parse(e) {
			const { ctx: t, status: a } = this._processInputParams(e),
				s = this._def;
			if (t.parsedType !== n.array) return f(t, { code: i.invalid_type, expected: n.array, received: t.parsedType }), _;
			if (null !== s.exactLength) {
				const e = t.data.length > s.exactLength.value,
					n = t.data.length < s.exactLength.value;
				(e || n) && (f(t, { code: e ? i.too_big : i.too_small, minimum: n ? s.exactLength.value : void 0, maximum: e ? s.exactLength.value : void 0, type: "array", inclusive: !0, exact: !0, message: s.exactLength.message }), a.dirty());
			}
			if (
				(null !== s.minLength && t.data.length < s.minLength.value && (f(t, { code: i.too_small, minimum: s.minLength.value, type: "array", inclusive: !0, exact: !1, message: s.minLength.message }), a.dirty()),
				null !== s.maxLength && t.data.length > s.maxLength.value && (f(t, { code: i.too_big, maximum: s.maxLength.value, type: "array", inclusive: !0, exact: !1, message: s.maxLength.message }), a.dirty()),
				t.common.async)
			)
				return Promise.all([...t.data].map((e, a) => s.type._parseAsync(new T(t, e, t.path, a)))).then((e) => y.mergeArray(a, e));
			const r = [...t.data].map((e, a) => s.type._parseSync(new T(t, e, t.path, a)));
			return y.mergeArray(a, r);
		}
		get element() {
			return this._def.type;
		}
		min(e, t) {
			return new H({ ...this._def, minLength: { value: e, message: w.toString(t) } });
		}
		max(e, t) {
			return new H({ ...this._def, maxLength: { value: e, message: w.toString(t) } });
		}
		length(e, t) {
			return new H({ ...this._def, exactLength: { value: e, message: w.toString(t) } });
		}
		nonempty(e) {
			return this.min(1, e);
		}
	}
	function G(e) {
		if (e instanceof X) {
			const t = {};
			for (const a in e.shape) {
				const s = e.shape[a];
				t[a] = ye.create(G(s));
			}
			return new X({ ...e._def, shape: () => t });
		}
		return e instanceof H ? new H({ ...e._def, type: G(e.element) }) : e instanceof ye ? ye.create(G(e.unwrap())) : e instanceof _e ? _e.create(G(e.unwrap())) : e instanceof ne ? ne.create(e.items.map((e) => G(e))) : e;
	}
	H.create = (e, t) => new H({ type: e, minLength: null, maxLength: null, exactLength: null, typeName: Oe.ZodArray, ...N(t) });
	class X extends S {
		constructor() {
			super(...arguments), (this._cached = null), (this.nonstrict = this.passthrough), (this.augment = this.extend);
		}
		_getCached() {
			if (null !== this._cached) return this._cached;
			const t = this._def.shape(),
				a = e.objectKeys(t);
			return (this._cached = { shape: t, keys: a });
		}
		_parse(e) {
			if (this._getType(e) !== n.object) {
				const t = this._getOrReturnCtx(e);
				return f(t, { code: i.invalid_type, expected: n.object, received: t.parsedType }), _;
			}
			const { status: t, ctx: a } = this._processInputParams(e),
				{ shape: s, keys: r } = this._getCached(),
				o = [];
			if (!(this._def.catchall instanceof J && "strip" === this._def.unknownKeys)) for (const e in a.data) r.includes(e) || o.push(e);
			const d = [];
			for (const e of r) {
				const t = s[e],
					n = a.data[e];
				d.push({ key: { status: "valid", value: e }, value: t._parse(new T(a, n, a.path, e)), alwaysSet: e in a.data });
			}
			if (this._def.catchall instanceof J) {
				const e = this._def.unknownKeys;
				if ("passthrough" === e) for (const e of o) d.push({ key: { status: "valid", value: e }, value: { status: "valid", value: a.data[e] } });
				else if ("strict" === e) o.length > 0 && (f(a, { code: i.unrecognized_keys, keys: o }), t.dirty());
				else if ("strip" !== e) throw new Error("Internal ZodObject error: invalid unknownKeys value.");
			} else {
				const e = this._def.catchall;
				for (const t of o) {
					const s = a.data[t];
					d.push({ key: { status: "valid", value: t }, value: e._parse(new T(a, s, a.path, t)), alwaysSet: t in a.data });
				}
			}
			return a.common.async
				? Promise.resolve()
						.then(async () => {
							const e = [];
							for (const t of d) {
								const a = await t.key;
								e.push({ key: a, value: await t.value, alwaysSet: t.alwaysSet });
							}
							return e;
						})
						.then((e) => y.mergeObjectSync(t, e))
				: y.mergeObjectSync(t, d);
		}
		get shape() {
			return this._def.shape();
		}
		strict(e) {
			return (
				w.errToObj,
				new X({
					...this._def,
					unknownKeys: "strict",
					...(void 0 !== e
						? {
								errorMap: (t, a) => {
									var s, n, r, i;
									const o = null !== (r = null === (n = (s = this._def).errorMap) || void 0 === n ? void 0 : n.call(s, t, a).message) && void 0 !== r ? r : a.defaultError;
									return "unrecognized_keys" === t.code ? { message: null !== (i = w.errToObj(e).message) && void 0 !== i ? i : o } : { message: o };
								},
						  }
						: {}),
				})
			);
		}
		strip() {
			return new X({ ...this._def, unknownKeys: "strip" });
		}
		passthrough() {
			return new X({ ...this._def, unknownKeys: "passthrough" });
		}
		extend(e) {
			return new X({ ...this._def, shape: () => ({ ...this._def.shape(), ...e }) });
		}
		merge(e) {
			return new X({ unknownKeys: e._def.unknownKeys, catchall: e._def.catchall, shape: () => ({ ...this._def.shape(), ...e._def.shape() }), typeName: Oe.ZodObject });
		}
		setKey(e, t) {
			return this.augment({ [e]: t });
		}
		catchall(e) {
			return new X({ ...this._def, catchall: e });
		}
		pick(t) {
			const a = {};
			return (
				e.objectKeys(t).forEach((e) => {
					t[e] && this.shape[e] && (a[e] = this.shape[e]);
				}),
				new X({ ...this._def, shape: () => a })
			);
		}
		omit(t) {
			const a = {};
			return (
				e.objectKeys(this.shape).forEach((e) => {
					t[e] || (a[e] = this.shape[e]);
				}),
				new X({ ...this._def, shape: () => a })
			);
		}
		deepPartial() {
			return G(this);
		}
		partial(t) {
			const a = {};
			return (
				e.objectKeys(this.shape).forEach((e) => {
					const s = this.shape[e];
					t && !t[e] ? (a[e] = s) : (a[e] = s.optional());
				}),
				new X({ ...this._def, shape: () => a })
			);
		}
		required(t) {
			const a = {};
			return (
				e.objectKeys(this.shape).forEach((e) => {
					if (t && !t[e]) a[e] = this.shape[e];
					else {
						let t = this.shape[e];
						for (; t instanceof ye; ) t = t._def.innerType;
						a[e] = t;
					}
				}),
				new X({ ...this._def, shape: () => a })
			);
		}
		keyof() {
			return le(e.objectKeys(this.shape));
		}
	}
	(X.create = (e, t) => new X({ shape: () => e, unknownKeys: "strip", catchall: J.create(), typeName: Oe.ZodObject, ...N(t) })),
		(X.strictCreate = (e, t) => new X({ shape: () => e, unknownKeys: "strict", catchall: J.create(), typeName: Oe.ZodObject, ...N(t) })),
		(X.lazycreate = (e, t) => new X({ shape: e, unknownKeys: "strip", catchall: J.create(), typeName: Oe.ZodObject, ...N(t) }));
	class Q extends S {
		_parse(e) {
			const { ctx: t } = this._processInputParams(e),
				a = this._def.options;
			if (t.common.async)
				return Promise.all(
					a.map(async (e) => {
						const a = { ...t, common: { ...t.common, issues: [] }, parent: null };
						return { result: await e._parseAsync({ data: t.data, path: t.path, parent: a }), ctx: a };
					})
				).then(function (e) {
					for (const t of e) if ("valid" === t.result.status) return t.result;
					for (const a of e) if ("dirty" === a.result.status) return t.common.issues.push(...a.ctx.common.issues), a.result;
					const a = e.map((e) => new d(e.ctx.common.issues));
					return f(t, { code: i.invalid_union, unionErrors: a }), _;
				});
			{
				let e;
				const s = [];
				for (const n of a) {
					const a = { ...t, common: { ...t.common, issues: [] }, parent: null },
						r = n._parseSync({ data: t.data, path: t.path, parent: a });
					if ("valid" === r.status) return r;
					"dirty" !== r.status || e || (e = { result: r, ctx: a }), a.common.issues.length && s.push(a.common.issues);
				}
				if (e) return t.common.issues.push(...e.ctx.common.issues), e.result;
				const n = s.map((e) => new d(e));
				return f(t, { code: i.invalid_union, unionErrors: n }), _;
			}
		}
		get options() {
			return this._def.options;
		}
	}
	Q.create = (e, t) => new Q({ options: e, typeName: Oe.ZodUnion, ...N(t) });
	const ee = (e) =>
		e instanceof ce
			? ee(e.schema)
			: e instanceof fe
			? ee(e.innerType())
			: e instanceof ue
			? [e.value]
			: e instanceof pe
			? e.options
			: e instanceof he
			? Object.keys(e.enum)
			: e instanceof ve
			? ee(e._def.innerType)
			: e instanceof B
			? [void 0]
			: e instanceof F
			? [null]
			: null;
	class te extends S {
		_parse(e) {
			const { ctx: t } = this._processInputParams(e);
			if (t.parsedType !== n.object) return f(t, { code: i.invalid_type, expected: n.object, received: t.parsedType }), _;
			const a = this.discriminator,
				s = t.data[a],
				r = this.optionsMap.get(s);
			return r
				? t.common.async
					? r._parseAsync({ data: t.data, path: t.path, parent: t })
					: r._parseSync({ data: t.data, path: t.path, parent: t })
				: (f(t, { code: i.invalid_union_discriminator, options: Array.from(this.optionsMap.keys()), path: [a] }), _);
		}
		get discriminator() {
			return this._def.discriminator;
		}
		get options() {
			return this._def.options;
		}
		get optionsMap() {
			return this._def.optionsMap;
		}
		static create(e, t, a) {
			const s = new Map();
			for (const a of t) {
				const t = ee(a.shape[e]);
				if (!t) throw new Error(`A discriminator value for key \`${e}\` could not be extracted from all schema options`);
				for (const n of t) {
					if (s.has(n)) throw new Error(`Discriminator property ${String(e)} has duplicate value ${String(n)}`);
					s.set(n, a);
				}
			}
			return new te({ typeName: Oe.ZodDiscriminatedUnion, discriminator: e, options: t, optionsMap: s, ...N(a) });
		}
	}
	function ae(t, a) {
		const s = r(t),
			i = r(a);
		if (t === a) return { valid: !0, data: t };
		if (s === n.object && i === n.object) {
			const s = e.objectKeys(a),
				n = e.objectKeys(t).filter((e) => -1 !== s.indexOf(e)),
				r = { ...t, ...a };
			for (const e of n) {
				const s = ae(t[e], a[e]);
				if (!s.valid) return { valid: !1 };
				r[e] = s.data;
			}
			return { valid: !0, data: r };
		}
		if (s === n.array && i === n.array) {
			if (t.length !== a.length) return { valid: !1 };
			const e = [];
			for (let s = 0; s < t.length; s++) {
				const n = ae(t[s], a[s]);
				if (!n.valid) return { valid: !1 };
				e.push(n.data);
			}
			return { valid: !0, data: e };
		}
		return s === n.date && i === n.date && +t == +a ? { valid: !0, data: t } : { valid: !1 };
	}
	class se extends S {
		_parse(e) {
			const { status: t, ctx: a } = this._processInputParams(e),
				s = (e, s) => {
					if (x(e) || x(s)) return _;
					const n = ae(e.value, s.value);
					return n.valid ? ((b(e) || b(s)) && t.dirty(), { status: t.value, value: n.data }) : (f(a, { code: i.invalid_intersection_types }), _);
				};
			return a.common.async
				? Promise.all([this._def.left._parseAsync({ data: a.data, path: a.path, parent: a }), this._def.right._parseAsync({ data: a.data, path: a.path, parent: a })]).then(([e, t]) => s(e, t))
				: s(this._def.left._parseSync({ data: a.data, path: a.path, parent: a }), this._def.right._parseSync({ data: a.data, path: a.path, parent: a }));
		}
	}
	se.create = (e, t, a) => new se({ left: e, right: t, typeName: Oe.ZodIntersection, ...N(a) });
	class ne extends S {
		_parse(e) {
			const { status: t, ctx: a } = this._processInputParams(e);
			if (a.parsedType !== n.array) return f(a, { code: i.invalid_type, expected: n.array, received: a.parsedType }), _;
			if (a.data.length < this._def.items.length) return f(a, { code: i.too_small, minimum: this._def.items.length, inclusive: !0, exact: !1, type: "array" }), _;
			!this._def.rest && a.data.length > this._def.items.length && (f(a, { code: i.too_big, maximum: this._def.items.length, inclusive: !0, exact: !1, type: "array" }), t.dirty());
			const s = [...a.data]
				.map((e, t) => {
					const s = this._def.items[t] || this._def.rest;
					return s ? s._parse(new T(a, e, a.path, t)) : null;
				})
				.filter((e) => !!e);
			return a.common.async ? Promise.all(s).then((e) => y.mergeArray(t, e)) : y.mergeArray(t, s);
		}
		get items() {
			return this._def.items;
		}
		rest(e) {
			return new ne({ ...this._def, rest: e });
		}
	}
	ne.create = (e, t) => {
		if (!Array.isArray(e)) throw new Error("You must pass an array of schemas to z.tuple([ ... ])");
		return new ne({ items: e, typeName: Oe.ZodTuple, rest: null, ...N(t) });
	};
	class re extends S {
		get keySchema() {
			return this._def.keyType;
		}
		get valueSchema() {
			return this._def.valueType;
		}
		_parse(e) {
			const { status: t, ctx: a } = this._processInputParams(e);
			if (a.parsedType !== n.object) return f(a, { code: i.invalid_type, expected: n.object, received: a.parsedType }), _;
			const s = [],
				r = this._def.keyType,
				o = this._def.valueType;
			for (const e in a.data) s.push({ key: r._parse(new T(a, e, a.path, e)), value: o._parse(new T(a, a.data[e], a.path, e)) });
			return a.common.async ? y.mergeObjectAsync(t, s) : y.mergeObjectSync(t, s);
		}
		get element() {
			return this._def.valueType;
		}
		static create(e, t, a) {
			return new re(t instanceof S ? { keyType: e, valueType: t, typeName: Oe.ZodRecord, ...N(a) } : { keyType: $.create(), valueType: e, typeName: Oe.ZodRecord, ...N(t) });
		}
	}
	class ie extends S {
		_parse(e) {
			const { status: t, ctx: a } = this._processInputParams(e);
			if (a.parsedType !== n.map) return f(a, { code: i.invalid_type, expected: n.map, received: a.parsedType }), _;
			const s = this._def.keyType,
				r = this._def.valueType,
				o = [...a.data.entries()].map(([e, t], n) => ({ key: s._parse(new T(a, e, a.path, [n, "key"])), value: r._parse(new T(a, t, a.path, [n, "value"])) }));
			if (a.common.async) {
				const e = new Map();
				return Promise.resolve().then(async () => {
					for (const a of o) {
						const s = await a.key,
							n = await a.value;
						if ("aborted" === s.status || "aborted" === n.status) return _;
						("dirty" !== s.status && "dirty" !== n.status) || t.dirty(), e.set(s.value, n.value);
					}
					return { status: t.value, value: e };
				});
			}
			{
				const e = new Map();
				for (const a of o) {
					const s = a.key,
						n = a.value;
					if ("aborted" === s.status || "aborted" === n.status) return _;
					("dirty" !== s.status && "dirty" !== n.status) || t.dirty(), e.set(s.value, n.value);
				}
				return { status: t.value, value: e };
			}
		}
	}
	ie.create = (e, t, a) => new ie({ valueType: t, keyType: e, typeName: Oe.ZodMap, ...N(a) });
	class oe extends S {
		_parse(e) {
			const { status: t, ctx: a } = this._processInputParams(e);
			if (a.parsedType !== n.set) return f(a, { code: i.invalid_type, expected: n.set, received: a.parsedType }), _;
			const s = this._def;
			null !== s.minSize && a.data.size < s.minSize.value && (f(a, { code: i.too_small, minimum: s.minSize.value, type: "set", inclusive: !0, exact: !1, message: s.minSize.message }), t.dirty()),
				null !== s.maxSize && a.data.size > s.maxSize.value && (f(a, { code: i.too_big, maximum: s.maxSize.value, type: "set", inclusive: !0, exact: !1, message: s.maxSize.message }), t.dirty());
			const r = this._def.valueType;
			function o(e) {
				const a = new Set();
				for (const s of e) {
					if ("aborted" === s.status) return _;
					"dirty" === s.status && t.dirty(), a.add(s.value);
				}
				return { status: t.value, value: a };
			}
			const d = [...a.data.values()].map((e, t) => r._parse(new T(a, e, a.path, t)));
			return a.common.async ? Promise.all(d).then((e) => o(e)) : o(d);
		}
		min(e, t) {
			return new oe({ ...this._def, minSize: { value: e, message: w.toString(t) } });
		}
		max(e, t) {
			return new oe({ ...this._def, maxSize: { value: e, message: w.toString(t) } });
		}
		size(e, t) {
			return this.min(e, t).max(e, t);
		}
		nonempty(e) {
			return this.min(1, e);
		}
	}
	oe.create = (e, t) => new oe({ valueType: e, minSize: null, maxSize: null, typeName: Oe.ZodSet, ...N(t) });
	class de extends S {
		constructor() {
			super(...arguments), (this.validate = this.implement);
		}
		_parse(e) {
			const { ctx: t } = this._processInputParams(e);
			if (t.parsedType !== n.function) return f(t, { code: i.invalid_type, expected: n.function, received: t.parsedType }), _;
			function a(e, a) {
				return h({ data: e, path: t.path, errorMaps: [t.common.contextualErrorMap, t.schemaErrorMap, p(), c].filter((e) => !!e), issueData: { code: i.invalid_arguments, argumentsError: a } });
			}
			function s(e, a) {
				return h({ data: e, path: t.path, errorMaps: [t.common.contextualErrorMap, t.schemaErrorMap, p(), c].filter((e) => !!e), issueData: { code: i.invalid_return_type, returnTypeError: a } });
			}
			const r = { errorMap: t.common.contextualErrorMap },
				o = t.data;
			return this._def.returns instanceof me
				? g(async (...e) => {
						const t = new d([]),
							n = await this._def.args.parseAsync(e, r).catch((s) => {
								throw (t.addIssue(a(e, s)), t);
							}),
							i = await o(...n);
						return await this._def.returns._def.type.parseAsync(i, r).catch((e) => {
							throw (t.addIssue(s(i, e)), t);
						});
				  })
				: g((...e) => {
						const t = this._def.args.safeParse(e, r);
						if (!t.success) throw new d([a(e, t.error)]);
						const n = o(...t.data),
							i = this._def.returns.safeParse(n, r);
						if (!i.success) throw new d([s(n, i.error)]);
						return i.data;
				  });
		}
		parameters() {
			return this._def.args;
		}
		returnType() {
			return this._def.returns;
		}
		args(...e) {
			return new de({ ...this._def, args: ne.create(e).rest(q.create()) });
		}
		returns(e) {
			return new de({ ...this._def, returns: e });
		}
		implement(e) {
			return this.parse(e);
		}
		strictImplement(e) {
			return this.parse(e);
		}
		static create(e, t, a) {
			return new de({ args: e || ne.create([]).rest(q.create()), returns: t || q.create(), typeName: Oe.ZodFunction, ...N(a) });
		}
	}
	class ce extends S {
		get schema() {
			return this._def.getter();
		}
		_parse(e) {
			const { ctx: t } = this._processInputParams(e);
			return this._def.getter()._parse({ data: t.data, path: t.path, parent: t });
		}
	}
	ce.create = (e, t) => new ce({ getter: e, typeName: Oe.ZodLazy, ...N(t) });
	class ue extends S {
		_parse(e) {
			if (e.data !== this._def.value) {
				const t = this._getOrReturnCtx(e);
				return f(t, { received: t.data, code: i.invalid_literal, expected: this._def.value }), _;
			}
			return { status: "valid", value: e.data };
		}
		get value() {
			return this._def.value;
		}
	}
	function le(e, t) {
		return new pe({ values: e, typeName: Oe.ZodEnum, ...N(t) });
	}
	ue.create = (e, t) => new ue({ value: e, typeName: Oe.ZodLiteral, ...N(t) });
	class pe extends S {
		_parse(t) {
			if ("string" != typeof t.data) {
				const a = this._getOrReturnCtx(t),
					s = this._def.values;
				return f(a, { expected: e.joinValues(s), received: a.parsedType, code: i.invalid_type }), _;
			}
			if (-1 === this._def.values.indexOf(t.data)) {
				const e = this._getOrReturnCtx(t),
					a = this._def.values;
				return f(e, { received: e.data, code: i.invalid_enum_value, options: a }), _;
			}
			return g(t.data);
		}
		get options() {
			return this._def.values;
		}
		get enum() {
			const e = {};
			for (const t of this._def.values) e[t] = t;
			return e;
		}
		get Values() {
			const e = {};
			for (const t of this._def.values) e[t] = t;
			return e;
		}
		get Enum() {
			const e = {};
			for (const t of this._def.values) e[t] = t;
			return e;
		}
		extract(e) {
			return pe.create(e);
		}
		exclude(e) {
			return pe.create(this.options.filter((t) => !e.includes(t)));
		}
	}
	pe.create = le;
	class he extends S {
		_parse(t) {
			const a = e.getValidEnumValues(this._def.values),
				s = this._getOrReturnCtx(t);
			if (s.parsedType !== n.string && s.parsedType !== n.number) {
				const t = e.objectValues(a);
				return f(s, { expected: e.joinValues(t), received: s.parsedType, code: i.invalid_type }), _;
			}
			if (-1 === a.indexOf(t.data)) {
				const t = e.objectValues(a);
				return f(s, { received: s.data, code: i.invalid_enum_value, options: t }), _;
			}
			return g(t.data);
		}
		get enum() {
			return this._def.values;
		}
	}
	he.create = (e, t) => new he({ values: e, typeName: Oe.ZodNativeEnum, ...N(t) });
	class me extends S {
		unwrap() {
			return this._def.type;
		}
		_parse(e) {
			const { ctx: t } = this._processInputParams(e);
			if (t.parsedType !== n.promise && !1 === t.common.async) return f(t, { code: i.invalid_type, expected: n.promise, received: t.parsedType }), _;
			const a = t.parsedType === n.promise ? t.data : Promise.resolve(t.data);
			return g(a.then((e) => this._def.type.parseAsync(e, { path: t.path, errorMap: t.common.contextualErrorMap })));
		}
	}
	me.create = (e, t) => new me({ type: e, typeName: Oe.ZodPromise, ...N(t) });
	class fe extends S {
		innerType() {
			return this._def.schema;
		}
		sourceType() {
			return this._def.schema._def.typeName === Oe.ZodEffects ? this._def.schema.sourceType() : this._def.schema;
		}
		_parse(t) {
			const { status: a, ctx: s } = this._processInputParams(t),
				n = this._def.effect || null;
			if ("preprocess" === n.type) {
				const e = n.transform(s.data);
				return s.common.async ? Promise.resolve(e).then((e) => this._def.schema._parseAsync({ data: e, path: s.path, parent: s })) : this._def.schema._parseSync({ data: e, path: s.path, parent: s });
			}
			const r = {
				addIssue: (e) => {
					f(s, e), e.fatal ? a.abort() : a.dirty();
				},
				get path() {
					return s.path;
				},
			};
			if (((r.addIssue = r.addIssue.bind(r)), "refinement" === n.type)) {
				const e = (e) => {
					const t = n.refinement(e, r);
					if (s.common.async) return Promise.resolve(t);
					if (t instanceof Promise) throw new Error("Async refinement encountered during synchronous parse operation. Use .parseAsync instead.");
					return e;
				};
				if (!1 === s.common.async) {
					const t = this._def.schema._parseSync({ data: s.data, path: s.path, parent: s });
					return "aborted" === t.status ? _ : ("dirty" === t.status && a.dirty(), e(t.value), { status: a.value, value: t.value });
				}
				return this._def.schema._parseAsync({ data: s.data, path: s.path, parent: s }).then((t) => ("aborted" === t.status ? _ : ("dirty" === t.status && a.dirty(), e(t.value).then(() => ({ status: a.value, value: t.value })))));
			}
			if ("transform" === n.type) {
				if (!1 === s.common.async) {
					const e = this._def.schema._parseSync({ data: s.data, path: s.path, parent: s });
					if (!k(e)) return e;
					const t = n.transform(e.value, r);
					if (t instanceof Promise) throw new Error("Asynchronous transform encountered during synchronous parse operation. Use .parseAsync instead.");
					return { status: a.value, value: t };
				}
				return this._def.schema._parseAsync({ data: s.data, path: s.path, parent: s }).then((e) => (k(e) ? Promise.resolve(n.transform(e.value, r)).then((e) => ({ status: a.value, value: e })) : e));
			}
			e.assertNever(n);
		}
	}
	(fe.create = (e, t, a) => new fe({ schema: e, typeName: Oe.ZodEffects, effect: t, ...N(a) })), (fe.createWithPreprocess = (e, t, a) => new fe({ schema: t, effect: { type: "preprocess", transform: e }, typeName: Oe.ZodEffects, ...N(a) }));
	class ye extends S {
		_parse(e) {
			return this._getType(e) === n.undefined ? g(void 0) : this._def.innerType._parse(e);
		}
		unwrap() {
			return this._def.innerType;
		}
	}
	ye.create = (e, t) => new ye({ innerType: e, typeName: Oe.ZodOptional, ...N(t) });
	class _e extends S {
		_parse(e) {
			return this._getType(e) === n.null ? g(null) : this._def.innerType._parse(e);
		}
		unwrap() {
			return this._def.innerType;
		}
	}
	_e.create = (e, t) => new _e({ innerType: e, typeName: Oe.ZodNullable, ...N(t) });
	class ve extends S {
		_parse(e) {
			const { ctx: t } = this._processInputParams(e);
			let a = t.data;
			return t.parsedType === n.undefined && (a = this._def.defaultValue()), this._def.innerType._parse({ data: a, path: t.path, parent: t });
		}
		removeDefault() {
			return this._def.innerType;
		}
	}
	ve.create = (e, t) => new ve({ innerType: e, typeName: Oe.ZodDefault, defaultValue: "function" == typeof t.default ? t.default : () => t.default, ...N(t) });
	class ge extends S {
		_parse(e) {
			const { ctx: t } = this._processInputParams(e),
				a = { ...t, common: { ...t.common, issues: [] } },
				s = this._def.innerType._parse({ data: a.data, path: a.path, parent: { ...a } });
			return Z(s)
				? s.then((e) => ({
						status: "valid",
						value:
							"valid" === e.status
								? e.value
								: this._def.catchValue({
										get error() {
											return new d(a.common.issues);
										},
										input: a.data,
								  }),
				  }))
				: {
						status: "valid",
						value:
							"valid" === s.status
								? s.value
								: this._def.catchValue({
										get error() {
											return new d(a.common.issues);
										},
										input: a.data,
								  }),
				  };
		}
		removeCatch() {
			return this._def.innerType;
		}
	}
	ge.create = (e, t) => new ge({ innerType: e, typeName: Oe.ZodCatch, catchValue: "function" == typeof t.catch ? t.catch : () => t.catch, ...N(t) });
	class xe extends S {
		_parse(e) {
			if (this._getType(e) !== n.nan) {
				const t = this._getOrReturnCtx(e);
				return f(t, { code: i.invalid_type, expected: n.nan, received: t.parsedType }), _;
			}
			return { status: "valid", value: e.data };
		}
	}
	xe.create = (e) => new xe({ typeName: Oe.ZodNaN, ...N(e) });
	const be = Symbol("zod_brand");
	class ke extends S {
		_parse(e) {
			const { ctx: t } = this._processInputParams(e),
				a = t.data;
			return this._def.type._parse({ data: a, path: t.path, parent: t });
		}
		unwrap() {
			return this._def.type;
		}
	}
	class Ze extends S {
		_parse(e) {
			const { status: t, ctx: a } = this._processInputParams(e);
			if (a.common.async)
				return (async () => {
					const e = await this._def.in._parseAsync({ data: a.data, path: a.path, parent: a });
					return "aborted" === e.status ? _ : "dirty" === e.status ? (t.dirty(), v(e.value)) : this._def.out._parseAsync({ data: e.value, path: a.path, parent: a });
				})();
			{
				const e = this._def.in._parseSync({ data: a.data, path: a.path, parent: a });
				return "aborted" === e.status ? _ : "dirty" === e.status ? (t.dirty(), { status: "dirty", value: e.value }) : this._def.out._parseSync({ data: e.value, path: a.path, parent: a });
			}
		}
		static create(e, t) {
			return new Ze({ in: e, out: t, typeName: Oe.ZodPipeline });
		}
	}
	const we = (e, t = {}, a) =>
			e
				? W.create().superRefine((s, n) => {
						var r, i;
						if (!e(s)) {
							const e = "function" == typeof t ? t(s) : "string" == typeof t ? { message: t } : t,
								o = null === (i = null !== (r = e.fatal) && void 0 !== r ? r : a) || void 0 === i || i,
								d = "string" == typeof e ? { message: e } : e;
							n.addIssue({ code: "custom", ...d, fatal: o });
						}
				  })
				: W.create(),
		Te = { object: X.lazycreate };
	var Oe;
	!(function (e) {
		(e.ZodString = "ZodString"),
			(e.ZodNumber = "ZodNumber"),
			(e.ZodNaN = "ZodNaN"),
			(e.ZodBigInt = "ZodBigInt"),
			(e.ZodBoolean = "ZodBoolean"),
			(e.ZodDate = "ZodDate"),
			(e.ZodSymbol = "ZodSymbol"),
			(e.ZodUndefined = "ZodUndefined"),
			(e.ZodNull = "ZodNull"),
			(e.ZodAny = "ZodAny"),
			(e.ZodUnknown = "ZodUnknown"),
			(e.ZodNever = "ZodNever"),
			(e.ZodVoid = "ZodVoid"),
			(e.ZodArray = "ZodArray"),
			(e.ZodObject = "ZodObject"),
			(e.ZodUnion = "ZodUnion"),
			(e.ZodDiscriminatedUnion = "ZodDiscriminatedUnion"),
			(e.ZodIntersection = "ZodIntersection"),
			(e.ZodTuple = "ZodTuple"),
			(e.ZodRecord = "ZodRecord"),
			(e.ZodMap = "ZodMap"),
			(e.ZodSet = "ZodSet"),
			(e.ZodFunction = "ZodFunction"),
			(e.ZodLazy = "ZodLazy"),
			(e.ZodLiteral = "ZodLiteral"),
			(e.ZodEnum = "ZodEnum"),
			(e.ZodEffects = "ZodEffects"),
			(e.ZodNativeEnum = "ZodNativeEnum"),
			(e.ZodOptional = "ZodOptional"),
			(e.ZodNullable = "ZodNullable"),
			(e.ZodDefault = "ZodDefault"),
			(e.ZodCatch = "ZodCatch"),
			(e.ZodPromise = "ZodPromise"),
			(e.ZodBranded = "ZodBranded"),
			(e.ZodPipeline = "ZodPipeline");
	})(Oe || (Oe = {}));
	const Ne = (e, t = { message: `Input not instance of ${e.name}` }) => we((t) => t instanceof e, t),
		Se = $.create,
		Ee = D.create,
		Ce = xe.create,
		je = z.create,
		Ie = V.create,
		Pe = U.create,
		Re = K.create,
		Ae = B.create,
		Me = F.create,
		$e = W.create,
		Le = q.create,
		De = J.create,
		ze = Y.create,
		Ve = H.create,
		Ue = X.create,
		Ke = X.strictCreate,
		Be = Q.create,
		Fe = te.create,
		We = se.create,
		qe = ne.create,
		Je = re.create,
		Ye = ie.create,
		He = oe.create,
		Ge = de.create,
		Xe = ce.create,
		Qe = ue.create,
		et = pe.create,
		tt = he.create,
		at = me.create,
		st = fe.create,
		nt = ye.create,
		rt = _e.create,
		it = fe.createWithPreprocess,
		ot = Ze.create,
		dt = () => Se().optional(),
		ct = () => Ee().optional(),
		ut = () => Ie().optional(),
		lt = { string: (e) => $.create({ ...e, coerce: !0 }), number: (e) => D.create({ ...e, coerce: !0 }), boolean: (e) => V.create({ ...e, coerce: !0 }), bigint: (e) => z.create({ ...e, coerce: !0 }), date: (e) => U.create({ ...e, coerce: !0 }) },
		pt = _;
	var ht = Object.freeze({
		__proto__: null,
		defaultErrorMap: c,
		setErrorMap: l,
		getErrorMap: p,
		makeIssue: h,
		EMPTY_PATH: m,
		addIssueToContext: f,
		ParseStatus: y,
		INVALID: _,
		DIRTY: v,
		OK: g,
		isAborted: x,
		isDirty: b,
		isValid: k,
		isAsync: Z,
		get util() {
			return e;
		},
		get objectUtil() {
			return t;
		},
		ZodParsedType: n,
		getParsedType: r,
		ZodType: S,
		ZodString: $,
		ZodNumber: D,
		ZodBigInt: z,
		ZodBoolean: V,
		ZodDate: U,
		ZodSymbol: K,
		ZodUndefined: B,
		ZodNull: F,
		ZodAny: W,
		ZodUnknown: q,
		ZodNever: J,
		ZodVoid: Y,
		ZodArray: H,
		ZodObject: X,
		ZodUnion: Q,
		ZodDiscriminatedUnion: te,
		ZodIntersection: se,
		ZodTuple: ne,
		ZodRecord: re,
		ZodMap: ie,
		ZodSet: oe,
		ZodFunction: de,
		ZodLazy: ce,
		ZodLiteral: ue,
		ZodEnum: pe,
		ZodNativeEnum: he,
		ZodPromise: me,
		ZodEffects: fe,
		ZodTransformer: fe,
		ZodOptional: ye,
		ZodNullable: _e,
		ZodDefault: ve,
		ZodCatch: ge,
		ZodNaN: xe,
		BRAND: be,
		ZodBranded: ke,
		ZodPipeline: Ze,
		custom: we,
		Schema: S,
		ZodSchema: S,
		late: Te,
		get ZodFirstPartyTypeKind() {
			return Oe;
		},
		coerce: lt,
		any: $e,
		array: Ve,
		bigint: je,
		boolean: Ie,
		date: Pe,
		discriminatedUnion: Fe,
		effect: st,
		enum: et,
		function: Ge,
		instanceof: Ne,
		intersection: We,
		lazy: Xe,
		literal: Qe,
		map: Ye,
		nan: Ce,
		nativeEnum: tt,
		never: De,
		null: Me,
		nullable: rt,
		number: Ee,
		object: Ue,
		oboolean: ut,
		onumber: ct,
		optional: nt,
		ostring: dt,
		pipeline: ot,
		preprocess: it,
		promise: at,
		record: Je,
		set: He,
		strictObject: Ke,
		string: Se,
		symbol: Re,
		transformer: st,
		tuple: qe,
		undefined: Ae,
		union: Be,
		unknown: Le,
		void: ze,
		NEVER: pt,
		ZodIssueCode: i,
		quotelessJson: o,
		ZodError: d,
	});
	class mt {}
	Object.entries(s).forEach(([e, t]) => {
		mt[e] = t;
	}),
		(window.zod = mt);
})();
