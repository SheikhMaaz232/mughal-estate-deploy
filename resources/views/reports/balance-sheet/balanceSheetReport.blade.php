<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ $isUrdu ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <title>@lang('messages.balance_sheet')</title>

    <style>
        body {
            font-family: Arial;
            font-size: 14px;
            margin: 20px;
            direction: {{ $isUrdu ? 'rtl' : 'ltr' }};
            text-align: {{ $isUrdu ? 'right' : 'left' }};
        }

        .project {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 30px;
        }

        .title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        th {
            background: #f5f5f5;
        }

        .total {
            font-weight: bold;
            background: #e8f5e9;
        }

        .profit {
            font-weight: bold;
            background: #fff3cd;
        }

        .summary {
            margin-top: 40px;
        }
    </style>
</head>

<body>

    <h2>@lang('messages.balance_sheet')</h2>

    @if ($asOfDate)
        <p>{{ $asOfDate->format('d-m-Y') }}</p>
    @endif

    @foreach ($projectWiseData as $project)
        <div class="project">

            <div class="title">
                {{ $isUrdu ? $project->project_name_ur : $project->project_name_en }}
            </div>

            {{-- ASSETS --}}
            <h3>@lang('messages.assets')</h3>
            <table>
                @foreach ($project->assets as $a)
                    <tr>
                        <td>{{ $isUrdu ? $a->account_name_ur : $a->account_name_en }}</td>
                        <td>{{ number_format(abs($a->balance), 2) }}</td>
                    </tr>
                @endforeach
                <tr class="total">
                    <td>@lang('messages.total_assets')</td>
                    <td>{{ number_format($project->total_assets, 2) }}</td>
                </tr>
            </table>

            {{-- LIABILITIES --}}
            <h3>@lang('messages.liabilities')</h3>
            <table>
                @foreach ($project->liabilities as $l)
                    <tr>
                        <td>{{ $isUrdu ? $l->account_name_ur : $l->account_name_en }}</td>
                        <td>{{ number_format(abs($l->balance), 2) }}</td>
                    </tr>
                @endforeach
                <tr class="total">
                    <td>@lang('messages.total_liabilities')</td>
                    <td>{{ number_format($project->total_liabilities, 2) }}</td>
                </tr>
            </table>

            {{-- EQUITY --}}
            <h3>@lang('messages.equity')</h3>
            <table>
                @foreach ($project->equity as $e)
                    <tr>
                        <td>{{ $isUrdu ? $e->account_name_ur : $e->account_name_en }}</td>
                        <td>{{ number_format(abs($e->balance), 2) }}</td>
                    </tr>
                @endforeach

                <tr class="profit">
                    <td>@lang('messages.net_profit')</td>
                    <td>{{ number_format($project->net_profit, 2) }}</td>
                </tr>

                <tr class="total">
                    <td>@lang('messages.total_equity')</td>
                    <td>{{ number_format($project->total_equity, 2) }}</td>
                </tr>
            </table>

            <strong>
                {{ number_format($project->total_assets, 2) }}
                =
                {{ number_format($project->total_liabilities + $project->total_equity, 2) }}
            </strong>

        </div>
    @endforeach

    {{-- GRAND SUMMARY --}}
    <div class="summary">

        <h3>@lang('messages.summary')</h3>

        <table>
            <tr>
                <th>@lang('messages.total_assets')</th>
                <td>{{ number_format($grandAssets, 2) }}</td>
            </tr>

            <tr>
                <th>@lang('messages.total_liabilities')</th>
                <td>{{ number_format($grandLiabilities, 2) }}</td>
            </tr>

            <tr>
                <th>@lang('messages.net_profit')</th>
                <td>{{ number_format($grandNetProfit, 2) }}</td>
            </tr>

            <tr class="total">
                <th>@lang('messages.total_equity')</th>
                <td>{{ number_format($grandEquity, 2) }}</td>
            </tr>
        </table>

    </div>

</body>

</html>
