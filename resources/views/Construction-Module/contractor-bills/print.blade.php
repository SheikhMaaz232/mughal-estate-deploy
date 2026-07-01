<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('messages.contractor-bill') {{ $bill->bill_no }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            color: #333;
            line-height: 1.6;
        }
        .print-container {
            max-width: 8.5in;
            height: 11in;
            margin: 0 auto;
            padding: 0.5in;
            background: white;
        }
        .header {
            text-align: center;
            margin-bottom: 2rem;
            border-bottom: 2px solid #333;
            padding-bottom: 1rem;
        }
        .header h1 {
            font-size: 24px;
            margin-bottom: 0.5rem;
        }
        .header p {
            font-size: 13px;
            margin: 0.25rem 0;
        }
        .bill-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1.5rem;
            font-size: 13px;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }
        .info-label {
            font-weight: bold;
        }
        .table-responsive {
            overflow-x: auto;
            margin: 1.5rem 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        thead th {
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            font-weight: 600;
        }
        tbody td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .text-right {
            text-align: right;
        }
        .footer {
            margin-top: 1.5rem;
            text-align: center;
            font-size: 11px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 0.5rem;
        }
        .total-section {
            margin-top: 1rem;
            text-align: right;
            font-size: 13px;
        }
        .total-row {
            display: flex;
            justify-content: flex-end;
            gap: 2rem;
            margin-bottom: 0.5rem;
        }
        .total-label {
            font-weight: bold;
            min-width: 120px;
        }
        .total-amount {
            min-width: 100px;
            text-align: right;
        }
        @media print {
            .print-button {
                display: none;
            }
            body {
                margin: 0;
                padding: 0;
            }
            .print-container {
                max-width: none;
                height: auto;
                margin: 0;
                padding: 0;
                page-break-after: always;
            }
        }
        .print-button {
            display: block;
            margin-bottom: 1rem;
            padding: 8px 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        .print-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <button class="print-button" onclick="window.print()">
        <i class="fa fa-print"></i> @lang('messages.print')
    </button>

    <div class="print-container">
        <div class="header">
            <h1>@lang('messages.contractor-bill')</h1>
            <p>@lang('messages.bill-number'): {{ $bill->bill_no }}</p>
            <p>@lang('messages.bill-date'): {{ $bill->bill_date->format('d-m-Y') }}</p>
        </div>

        <div class="bill-info">
            <div>
                <div class="info-row">
                    <span class="info-label">@lang('messages.tender'):</span>
                    <span>{{ App::getLocale() === 'ur' ? $bill->tender->title_ur : $bill->tender->title_en }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">@lang('messages.contractor'):</span>
                    <span>{{ $bill->contractorAccount->name }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">@lang('messages.work-order'):</span>
                    <span>{{ $bill->workOrder->id }}</span>
                </div>
            </div>
            <div>
                <div class="info-row">
                    <span class="info-label">@lang('messages.status'):</span>
                    <span>@lang('messages.' . str_replace('_', '-', $bill->status))</span>
                </div>
                @if($bill->remarks)
                <div class="info-row">
                    <span class="info-label">@lang('messages.remarks'):</span>
                    <span>{{ $bill->remarks }}</span>
                </div>
                @endif
            </div>
        </div>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('messages.description')</th>
                        <th>@lang('messages.unit')</th>
                        <th class="text-right">@lang('messages.quantity')</th>
                        <th class="text-right">@lang('messages.rate')</th>
                        <th class="text-right">@lang('messages.amount')</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bill->items as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->boqItem->item->name ?? 'N/A' }}</td>
                        <td>{{ $item->boqItem->unit ?? 'N/A' }}</td>
                        <td class="text-right">{{ number_format($item->quantity, 4) }}</td>
                        <td class="text-right">{{ number_format($item->rate, 2) }}</td>
                        <td class="text-right">{{ number_format($item->amount, 2) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align: center;">@lang('messages.no-items-found')</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="total-section">
            <div class="total-row">
                <span class="total-label">@lang('messages.total-bill-amount'):</span>
                <span class="total-amount">{{ number_format($bill->amount, 2) }}</span>
            </div>
        </div>

        @if($bill->isVerified())
        <div style="margin-top: 2rem;">
            <strong>@lang('messages.payment-information')</strong>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>@lang('messages.payment-date')</th>
                            <th>@lang('messages.voucher-type')</th>
                            <th>@lang('messages.voucher-id')</th>
                            <th class="text-right">@lang('messages.amount')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bill->payments as $payment)
                        <tr>
                            <td>{{ $payment->created_at->format('d-m-Y') }}</td>
                            <td>{{ $payment->voucher_type }}</td>
                            <td>{{ $payment->voucher_id }}</td>
                            <td class="text-right">{{ number_format($payment->amount, 2) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="text-align: center;">@lang('messages.no-payments-recorded')</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        <div class="footer">
            <p>@lang('messages.generated-on') {{ now()->format('d-m-Y H:i:s') }}</p>
        </div>
    </div>
</body>
</html>

