#include <stdio.h>

#define MAX_NODES 5

struct ControlFlowGraph {
    int nodes[MAX_NODES];
    int graph[MAX_NODES][MAX_NODES];
};

void initializeGraph(struct ControlFlowGraph *cfg) {
    int i, j;

    // Initialize nodes
    for (i = 0; i < MAX_NODES; i++) {
        cfg->nodes[i] = i + 1;
    }

    // Initialize graph (0 indicates no edge)
    for (i = 0; i < MAX_NODES; i++) {
        for (j = 0; j < MAX_NODES; j++) {
            cfg->graph[i][j] = 0;
        }
    }
}

void addEdge(struct ControlFlowGraph *cfg, int source, int destination) {
    cfg->graph[source - 1][destination - 1] = 1;
}

void getPredecessors(struct ControlFlowGraph *cfg, int node) {
    printf("Predecessors of Node %d: ", node);
    for (int i = 0; i < MAX_NODES; i++) {
        if (cfg->graph[i][node - 1] == 1) {
            printf("%d ", cfg->nodes[i]);
        }
    }
    printf("\n");
}

void getSuccessors(struct ControlFlowGraph *cfg, int node) {
    printf("Successors of Node %d: ", node);
    for (int i = 0; i < MAX_NODES; i++) {
        if (cfg->graph[node - 1][i] == 1) {
            printf("%d ", cfg->nodes[i]);
        }
    }
    printf("\n");
}

int main() {
    struct ControlFlowGraph cfg;
    initializeGraph(&cfg);

    // Add edges to the CFG
    addEdge(&cfg, 1, 2);
    addEdge(&cfg, 2, 3);
    addEdge(&cfg, 3, 4);
    addEdge(&cfg, 4, 5);

    // Get user input for the node
    int userNode;
    printf("Enter the node to find predecessors and successors: ");
    scanf("%d", &userNode);

    // Check if the userNode is valid
    if (userNode >= 1 && userNode <= MAX_NODES) {
        getPredecessors(&cfg, userNode);
        getSuccessors(&cfg, userNode);
    } else {
        printf("Invalid node number. Please enter a number between 1 and %d.\n", MAX_NODES);
    }

    return 0;
}