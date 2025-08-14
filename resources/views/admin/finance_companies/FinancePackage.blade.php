<script>
    class FinancePackage extends BaseChildClass {
        before(form) {

        }
        after(form) {
            this._termMonths       = this.term_months != null ? parseInt(this.term_months, 10) : null;
            this._downPctMin       = parseNumberString_(this.down_pct_min);
            this._downPctMax       = parseNumberString_(this.down_pct_max);
            this._interestMonthly  = parseNumberString_(this.interest_monthly); // %/tháng (VD 2.40)
        }
        get term_months() { return this._termMonths; }
        set term_months(v) { this._termMonths = (v != null && v !== '') ? parseInt(v, 10) : null; }

        // --- down_pct_min ---
        get down_pct_min() { return this._downPctMin; }
        set down_pct_min(v) { this._downPctMin = parseNumberString_(v); }

        // --- down_pct_max ---
        get down_pct_max() { return this._downPctMax; }
        set down_pct_max(v) { this._downPctMax = parseNumberString_(v); }

        // --- interest_monthly (%/tháng) ---
        get interest_monthly() { return this._interestMonthly; }
        set interest_monthly(v) { this._interestMonthly = parseNumberString_(v); }

        // (tuỳ chọn) getter hiển thị đẹp
        get downPctMinDisplay()      { return this._downPctMin      != null ? this._downPctMin.toFixed(2)      : ''; }
        get downPctMaxDisplay()      { return this._downPctMax      != null ? this._downPctMax.toFixed(2)      : ''; }
        get interestMonthlyDisplay() { return this._interestMonthly != null ? this._interestMonthly.toFixed(2) : ''; }

        get submit_data() {
            return {
                // term_months: this.term_months,
                // down_pct_min: this.down_pct_min,
                // down_pct_max: this.down_pct_max,
                // interest_monthly: this.interest_monthly,

                term_months: this._termMonths,
                down_pct_min: this._downPctMin,
                down_pct_max: this._downPctMax,
                interest_monthly: this._interestMonthly
            }
        }
    }
</script>
