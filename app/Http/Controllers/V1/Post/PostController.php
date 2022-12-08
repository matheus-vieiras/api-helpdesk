<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Post;

use App\Helpers\OrderByHelper;
use App\Http\Controllers\AbstractController;
use App\Services\Post\PostService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class PostController extends AbstractController
{
    protected array $searchFields = [
        'owner',
        'type',
    ];

    public function __construct(PostService $service)
    {
        parent::__construct($service);
    }

    public function findByTicket(Request $request, int $ticket): JsonResponse
    {
        try {
            $limit = (int)$request->get('limit', 10);
            $orderBy = $request->get('order_by', []);

            if (!empty($orderBy)) {
                $orderBy = OrderByHelper::treatOrderBy($orderBy);
            }

            $result = $this->service->findByTicket($ticket, $limit, $orderBy);

            $response = $this->successResponse($result, Response::HTTP_PARTIAL_CONTENT);
        } catch (Exception $e) {
            $response = $this->errorResponse($e);
        }

        return response()->json($response, $response['status_code']);
    }

    public function findBy(Request $request, string $param): JsonResponse
    {
        try {
            $result = $this->service->findBy($param);
            $response = $this->successResponse($result);
        } catch (Exception $e) {
            $response = $this->errorResponse($e);
        }

        return response()->json($response, $response['status_code']);
    }

    public function deleteBy(Request $request, string $param): JsonResponse
    {
        try {
            $result = $this->service->deleteBy($param);
            $response = $this->successResponse([
                'deletado' => $result
            ]);
        } catch (Exception $e) {
            $response = $this->errorResponse($e);
        }
        return response()->json($response, $response['status_code']);
    }

    public function deleteByTicket(Request $request, int $ticket): JsonResponse
    {
        try {
            $result = $this->service->deleteByTicket($ticket);
            $response = $this->successResponse([
                'deletado' => $result
            ]);
        } catch (Exception $e) {
            $response = $this->errorResponse($e);
        }

        return response()->json($response, $response['status_code']);

    }
}
