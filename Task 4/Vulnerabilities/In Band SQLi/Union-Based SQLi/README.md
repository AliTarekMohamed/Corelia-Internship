# UNION-Based SQL Injection

**Concise, step-by-step UNION-based SQL injection example demonstrating how to discover column counts, enumerate schema objects, and extract data from a vulnerable search endpoint.**

---

## Quick summary

**Target:** search parameter of a web application that queries a database with a `games` resource.

**New discovery:** Found a `users` table containing `username` and `password` columns; credential values were exfiltrated in the lab environment.

**Goal:** Discover original query shape (number of returned columns), enumerate schema (table/column names), and extract values (e.g., username, password).

---

## Summary of updated findings

- Application vulnerable to UNION-based SQL injection via the search parameter.
- Original SELECT returns **one** column (requires single-column UNION payloads).
- Discovered an additional table: `users`.
- Discovered columns in `users`: `username` and `password`.
- Credential values (usernames and passwords) were retrieved in the lab using a UNION payload that concatenates the fields into the single returned column.

---

## Testing steps

1. **Single-quote probe**  
   Inject a single quote (`'`) to observe application error behavior and whether errors are leaked. In this test there were no visible SQL errors or unusual responses.

2. **Determine number of columns**  
   Use `UNION` probes to match the number of columns in the original SELECT. A one-column `UNION` probe returned normal content; a two-column probe produced a different result (e.g., *Game not found*), indicating the original query expects **one** column.

3. **Enumerate schema**  
   Query the information schema to list tables and columns. From these probes the tester discovered a table named `users` and two columns named `username` and `password`.

4. **Extract data**  
   Because the application returned a single column, multiple fields were combined with `CONCAT` in the `UNION` projection to return both username and password together in the response.

---

## Findings

- The search parameter is vulnerable to UNION-based SQL injection.
- The original SELECT returns **one** column.
- Discovered table: `users`.
- Discovered columns: `username` and `password`.
- Successfully extracted values from the `users` table using a single-column `UNION` projection.

---

## Proof-of-Concept payloads

### Enumerate table names (information_schema)

```sql
' UNION SELECT table_name FROM information_schema.tables#
```

### Enumerate columns for table `users`

```sql
' UNION SELECT column_name FROM information_schema.columns WHERE table_name='users'#
```

### Extract usernames and passwords (concatenated into one column)

```sql
' UNION SELECT CONCAT(username, ' ', password) FROM users#
```

---

## Ethical & safety note

Retrieving authentication material (usernames, passwords) is highly sensitive. In a lab or authorized assessment this helps demonstrate impact; in the real world, access to such data can cause significant harm. Always:

- Obtain explicit written permission before testing.
- Avoid exposing or publishing real credentials in reports; redact or fake data when sharing publicly.
- Limit tests to non-destructive methods when possible and follow your engagement rules of engagement (RoE).

---

## Remediation (prioritized)

1. **Parameterize all SQL statements** — never concatenate user input into queries. Use prepared statements or ORM parameter binding.
2. **Suppress detailed DB error messages** in responses; log full details server-side only.
3. **Salt and hash passwords** using a modern, slow hashing algorithm (e.g., bcrypt, Argon2). Do not store plaintext passwords.
4. **Enforce least privilege** for the application database account — it should not need to read metadata or other application users' data unless required.
5. **Input validation & output encoding** — apply whitelists, length limits, and context-aware encoding for any reflected content.
6. **Monitoring and alerting** — detect anomalous queries and repeated failed attempts that might indicate exploitation attempts.

---

## Notes & considerations

- When the original SELECT returns **one** column, any `UNION` payload must project a single column (or combine multiple fields with `CONCAT`).
- Comment styles and terminators (e.g., `#`, `--`, `/* */`) vary by DBMS and application; you may need to adapt them.
- Some applications filter or normalize input; payload encoding, spacing or alternative quoting may be required.
- Privilege and schema visibility: not all DB accounts can read `information_schema`. Limitations vary by DBMS and privileges.



