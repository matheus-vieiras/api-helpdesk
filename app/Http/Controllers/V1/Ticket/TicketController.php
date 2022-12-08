<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Ticket;

use App\Helpers\OrderByHelper;
use App\Http\Controllers\AbstractController;
use App\Mail\SendMail;
use App\Models\Ticket\Ticket;
use App\Services\Ticket\TicketService;
use Exception;
use http\Message\Body;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class TicketController extends AbstractController
{
    protected array $searchFields = [
        'client_name',
        'client_email',
        'ticket_status'
    ];

    public function __construct(TicketService $service)
    {
        parent::__construct($service);
    }

    public function findByService(Request $request, int $services): JsonResponse
    {
        try {
            $limit = (int)$request->get('limit', 10);
            $orderBy = $request->get('order_by', []);

            if (!empty($orderBy)) {
                $orderBy = OrderByHelper::treatOrderBy($orderBy);
            }

            $result = $this->service->findByService($services, $limit, $orderBy);

            $response = $this->successResponse($result, Response::HTTP_PARTIAL_CONTENT);
        } catch (Exception $e) {
            $response = $this->errorResponse($e);
        }

        return response()->json($response, $response['status_code']);
    }

    public function findByCategory(Request $request, int $category): JsonResponse
    {
        try {
            $limit = (int)$request->get('limit', 10);
            $orderBy = $request->get('order_by', []);

            if (!empty($orderBy)) {
                $orderBy = OrderByHelper::treatOrderBy($orderBy);
            }

            $result = $this->service->findByCategory($category, $limit, $orderBy);

            $response = $this->successResponse($result, Response::HTTP_PARTIAL_CONTENT);
        } catch (Exception $e) {
            $response = $this->errorResponse($e);
        }

        return response()->json($response, $response['status_code']);
    }

    public function store(Request $request)
    {

//        $request->validate([
//            'nome' => 'required',
//            'email' => 'required|email',
//            'mensagem' => 'required',
//        ]);

        $data = array(
            'nome' => $request->nome,
            'email' => $request->email,
            'mensagem' => $request->mensagem,
        );

        Mail::to($request->email)->send(new SendMail($data));

//        Mail::to(config('mail.from.address'))
//            ->send(new SendMail($data));

        return response()->json($data);

    }

    public function index()
    {
        return view('mail.index');
    }

}
