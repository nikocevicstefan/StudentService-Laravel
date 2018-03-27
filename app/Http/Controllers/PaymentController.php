<?php

namespace App\Http\Controllers;

use App\Http\Resources\PaymentCollection;
use App\Http\Resources\PaymentResource;
use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return PaymentCollection
     */
    public function index()
    {
        return new PaymentCollection(Payment::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = $request->student;
        $semester = $request->semester;
        $amount = $request->amount;
        Payment::create(['student_id' => $student, 'semester_id' => $semester, 'amount' => $amount]);
        return response()->json(['success' => true, 'data' => ['message' => 'Payment successfully entered']]);
    }

    /**
     * Display the specified resource.
     *
     * @param Payment $payment
     * @return PaymentResource
     */
    public function show(Payment $payment)
    {
        return new PaymentResource($payment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $payment->student_id = request('student');
        $payment->semester_id = request('semester');
        $payment->amount = request('amount');
        $payment->update();

        return response()->json(['data' => $payment, 'status' => ['success' => true, 'message' => 'object updated']], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        try {
            $payment->delete();
        } catch (\Exception $e) {
            $e->getCode();
        }
        return response()->json(['status' => ['success' => true, 'message' => 'object deleted']], 200);
    }
}
